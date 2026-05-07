<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} — My Wishlist</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .product-card { transition: box-shadow 0.2s, transform 0.2s; }
        .product-card:hover { box-shadow: 0 8px 32px rgba(99,102,241,0.12); transform: translateY(-3px); }
        .product-card:hover .card-actions { opacity: 1; transform: translateY(0); }
        .card-actions { opacity: 0; transform: translateY(6px); transition: opacity 0.2s, transform 0.2s; }
        .heart-btn { transition: color 0.15s, transform 0.15s; }
        .heart-btn:hover { transform: scale(1.2); }
        @keyframes fadeUp { from { opacity:0; transform:translateY(14px); } to { opacity:1; transform:translateY(0); } }
        .fade-up { animation: fadeUp 0.35s ease both; }
        .fade-up:nth-child(1) { animation-delay: 0.05s; }
        .fade-up:nth-child(2) { animation-delay: 0.10s; }
        .fade-up:nth-child(3) { animation-delay: 0.15s; }
        .fade-up:nth-child(4) { animation-delay: 0.20s; }
        .fade-up:nth-child(5) { animation-delay: 0.25s; }
        .fade-up:nth-child(6) { animation-delay: 0.30s; }
        .sort-btn.active { background: linear-gradient(to right, #4f46e5, #7c3aed); color: white; border-color: transparent; }
        .badge-sale { background: linear-gradient(135deg, #ec4899, #f43f5e); }
        .view-toggle.active { background: #4f46e5; color: white; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

    <x-front.header />

    {{-- Hero Banner --}}
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 py-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-white flex items-center gap-3">
                        <i class="fas fa-heart text-pink-300"></i> My Wishlist
                    </h1>
                    <p class="text-indigo-200 text-sm mt-1">
                        {{ $wishlistItems->total() }} {{ Str::plural('item', $wishlistItems->total()) }} saved
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    @if ($wishlistItems->isNotEmpty())
                    <form action="{{ route('wishlist.clear') }}" method="POST"
                          onsubmit="return confirm('Remove all items from your wishlist?')">
                        @csrf @method('DELETE')
                        <button type="submit"
                                class="bg-white/15 hover:bg-white/25 text-white text-sm font-medium px-4 py-2 rounded-lg backdrop-blur-sm transition flex items-center gap-2">
                            <i class="fas fa-trash text-xs"></i> Clear All
                        </button>
                    </form>
                    @endif
                    <a href="{{ route('home') }}"
                       class="bg-white text-indigo-600 hover:bg-indigo-50 text-sm font-semibold px-4 py-2 rounded-lg transition flex items-center gap-2">
                        <i class="fas fa-shopping-bag text-xs"></i> Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        @if (session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 text-sm rounded-xl px-5 py-3 flex items-center gap-2 fade-up">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        @if ($wishlistItems->isNotEmpty())

        {{-- Toolbar --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm px-5 py-3 mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <i class="fas fa-heart text-pink-400"></i>
                <span><strong class="text-gray-800">{{ $wishlistItems->total() }}</strong> saved items</span>
            </div>

            <div class="flex items-center gap-3 flex-wrap">
                {{-- Sort --}}
                <div class="flex items-center gap-1">
                    <span class="text-xs text-gray-400 mr-1">Sort:</span>
                    @foreach (['newest' => 'Newest', 'oldest' => 'Oldest', 'price_asc' => 'Price ↑', 'price_desc' => 'Price ↓'] as $val => $label)
                    <a href="{{ request()->fullUrlWithQuery(['sort' => $val]) }}"
                       class="sort-btn {{ request('sort', 'newest') === $val ? 'active' : 'border border-gray-200 text-gray-500 hover:text-gray-700' }} px-3 py-1 rounded-lg text-xs font-medium transition">
                        {{ $label }}
                    </a>
                    @endforeach
                </div>

                {{-- View toggle --}}
                <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden">
                    <button onclick="setView('grid')" id="view-grid"
                            class="view-toggle active w-8 h-8 flex items-center justify-center transition text-sm">
                        <i class="fas fa-th"></i>
                    </button>
                    <button onclick="setView('list')" id="view-list"
                            class="view-toggle w-8 h-8 flex items-center justify-center transition text-sm text-gray-400">
                        <i class="fas fa-list"></i>
                    </button>
                </div>

                {{-- Add all to cart --}}
                <form action="{{ route('wishlist.addAllToCart') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2 rounded-xl text-xs font-semibold hover:opacity-90 transition flex items-center gap-2">
                        <i class="fas fa-shopping-cart"></i> Add All to Cart
                    </button>
                </form>
            </div>
        </div>

        {{-- ── GRID VIEW ────────────────────────────────────────── --}}
        <div id="grid-view" class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            @foreach ($wishlistItems as $item)
            @php $product = $item->product; @endphp
            <div class="product-card bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden fade-up">

                {{-- Image --}}
                <div class="relative overflow-hidden bg-gray-50 h-52">
                    @if ($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-full object-cover transition duration-300 hover:scale-105">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <i class="fas fa-image text-4xl text-gray-200"></i>
                        </div>
                    @endif

                    {{-- Badges --}}
                    <div class="absolute top-3 left-3 flex flex-col gap-1">
                        @if ($product->is_new ?? false)
                        <span class="bg-indigo-600 text-white text-xs font-semibold px-2.5 py-1 rounded-lg">New</span>
                        @endif
                        @if ($product->discount_percent ?? false)
                        <span class="badge-sale text-white text-xs font-semibold px-2.5 py-1 rounded-lg">
                            −{{ $product->discount_percent }}%
                        </span>
                        @endif
                        @if (!($product->in_stock ?? true))
                        <span class="bg-gray-500 text-white text-xs font-semibold px-2.5 py-1 rounded-lg">Out of Stock</span>
                        @endif
                    </div>

                    {{-- Remove from wishlist --}}
                    <form action="{{ route('wishlist.remove', $item) }}" method="POST"
                          class="absolute top-3 right-3">
                        @csrf @method('DELETE')
                        <button type="submit"
                                class="heart-btn w-9 h-9 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-sm text-pink-500 hover:text-pink-600">
                            <i class="fas fa-heart text-sm"></i>
                        </button>
                    </form>

                    {{-- Hover actions --}}
                    <div class="card-actions absolute bottom-3 left-3 right-3">
                        <form action="{{ route('cart.addFromWishlist', $item) }}" method="POST">
                            @csrf
                            <button type="submit"
                                    @if (!($product->in_stock ?? true)) disabled @endif
                                    class="w-full bg-white/90 backdrop-blur-sm hover:bg-indigo-600 hover:text-white text-indigo-600 text-xs font-semibold py-2.5 rounded-xl transition flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                                <i class="fas fa-shopping-cart text-xs"></i>
                                {{ ($product->in_stock ?? true) ? 'Add to Cart' : 'Out of Stock' }}
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Info --}}
                <div class="p-4">
                    @if ($product->category)
                    <p class="text-xs text-indigo-500 font-medium mb-1 uppercase tracking-wide">
                        {{ $product->category->name }}
                    </p>
                    @endif
                    <a href="{{ route('products.show', $product) }}"
                       class="text-sm font-semibold text-gray-800 hover:text-indigo-600 transition line-clamp-2 leading-snug">
                        {{ $product->name }}
                    </a>

                    {{-- Rating --}}
                    @if ($product->average_rating ?? false)
                    <div class="flex items-center gap-1 mt-1.5">
                        @for ($s = 1; $s <= 5; $s++)
                            <i class="fas fa-star text-xs {{ $s <= round($product->average_rating) ? 'text-yellow-400' : 'text-gray-200' }}"></i>
                        @endfor
                        <span class="text-xs text-gray-400 ml-1">({{ $product->reviews_count ?? 0 }})</span>
                    </div>
                    @endif

                    <div class="flex items-center justify-between mt-3">
                        <div class="flex items-baseline gap-1.5">
                            <span class="text-base font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                            @if ($product->original_price && $product->original_price > $product->price)
                            <span class="text-xs text-gray-400 line-through">${{ number_format($product->original_price, 2) }}</span>
                            @endif
                        </div>
                        <p class="text-xs text-gray-400">
                            Added {{ $item->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- ── LIST VIEW ────────────────────────────────────────── --}}
        <div id="list-view" class="hidden space-y-4">
            @foreach ($wishlistItems as $item)
            @php $product = $item->product; @endphp
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex items-center gap-0 fade-up hover:shadow-md transition">

                {{-- Image --}}
                <div class="w-28 h-28 sm:w-36 sm:h-36 flex-shrink-0 bg-gray-50 overflow-hidden">
                    @if ($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <i class="fas fa-image text-3xl text-gray-200"></i>
                        </div>
                    @endif
                </div>

                {{-- Details --}}
                <div class="flex-1 px-5 py-4 min-w-0">
                    @if ($product->category)
                    <p class="text-xs text-indigo-500 font-medium uppercase tracking-wide mb-0.5">
                        {{ $product->category->name }}
                    </p>
                    @endif
                    <a href="{{ route('products.show', $product) }}"
                       class="text-sm font-semibold text-gray-800 hover:text-indigo-600 transition line-clamp-1">
                        {{ $product->name }}
                    </a>
                    <p class="text-xs text-gray-400 mt-0.5 line-clamp-2">{{ Str::limit($product->description, 80) }}</p>

                    <div class="flex items-center gap-3 mt-2 flex-wrap">
                        <div class="flex items-baseline gap-1.5">
                            <span class="text-base font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                            @if ($product->original_price && $product->original_price > $product->price)
                            <span class="text-xs text-gray-400 line-through">${{ number_format($product->original_price, 2) }}</span>
                            @endif
                        </div>

                        @if ($product->discount_percent ?? false)
                        <span class="badge-sale text-white text-xs font-semibold px-2 py-0.5 rounded-lg">
                            −{{ $product->discount_percent }}%
                        </span>
                        @endif

                        @if (!($product->in_stock ?? true))
                        <span class="bg-red-100 text-red-600 text-xs font-semibold px-2 py-0.5 rounded-lg">Out of Stock</span>
                        @endif
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex flex-col items-end gap-2 px-5 py-4 flex-shrink-0">
                    <p class="text-xs text-gray-400 text-right">{{ $item->created_at->format('M d, Y') }}</p>

                    <form action="{{ route('cart.addFromWishlist', $item) }}" method="POST">
                        @csrf
                        <button type="submit"
                                @if (!($product->in_stock ?? true)) disabled @endif
                                class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-xs font-semibold px-4 py-2 rounded-xl hover:opacity-90 transition flex items-center gap-2 disabled:opacity-40 disabled:cursor-not-allowed">
                            <i class="fas fa-shopping-cart text-xs"></i>
                            {{ ($product->in_stock ?? true) ? 'Add to Cart' : 'Out of Stock' }}
                        </button>
                    </form>

                    <form action="{{ route('wishlist.remove', $item) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit"
                                class="text-xs text-gray-400 hover:text-red-500 transition flex items-center gap-1 font-medium">
                            <i class="fas fa-trash text-xs"></i> Remove
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if ($wishlistItems->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $wishlistItems->appends(request()->query())->links() }}
        </div>
        @endif

        {{-- You May Also Like --}}
        @if (isset($suggestedProducts) && $suggestedProducts->isNotEmpty())
        <div class="mt-14">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-900">You May Also Like</h2>
                <a href="{{ route('products.index') }}" class="text-indigo-600 text-sm font-medium hover:text-indigo-700">
                    Browse All →
                </a>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach ($suggestedProducts->take(4) as $product)
                <div class="product-card bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="relative h-44 bg-gray-50 overflow-hidden">
                        @if ($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <i class="fas fa-image text-3xl text-gray-200"></i>
                            </div>
                        @endif

                        {{-- Add to wishlist --}}
                        <form action="{{ route('wishlist.store') }}" method="POST"
                              class="absolute top-3 right-3">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit"
                                    class="heart-btn w-8 h-8 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-sm text-gray-300 hover:text-pink-500">
                                <i class="far fa-heart text-sm"></i>
                            </button>
                        </form>
                    </div>
                    <div class="p-4">
                        <a href="{{ route('products.show', $product) }}"
                           class="text-sm font-semibold text-gray-800 hover:text-indigo-600 transition line-clamp-1">
                            {{ $product->name }}
                        </a>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-base font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit"
                                        class="w-8 h-8 bg-indigo-100 hover:bg-indigo-600 text-indigo-600 hover:text-white rounded-lg flex items-center justify-center transition text-xs">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @else
        {{-- ── EMPTY STATE ──────────────────────────────────────── --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm py-24 text-center fade-up">
            <div class="relative w-24 h-24 mx-auto mb-6">
                <div class="w-24 h-24 bg-gradient-to-br from-indigo-50 to-pink-50 rounded-full flex items-center justify-center">
                    <i class="fas fa-heart text-4xl text-pink-300"></i>
                </div>
                <div class="absolute -bottom-1 -right-1 w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center">
                    <i class="fas fa-plus text-white text-xs"></i>
                </div>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Your wishlist is empty</h3>
            <p class="text-gray-400 text-sm mb-8 max-w-sm mx-auto">
                Save items you love by clicking the heart icon on any product. They'll appear here for easy access later.
            </p>
            <a href="{{ route('products.index') }}"
               class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-3 rounded-xl text-sm font-semibold hover:opacity-90 transition">
                <i class="fas fa-shopping-bag text-xs"></i> Discover Products
            </a>

            {{-- Categories suggestion --}}
            @if (isset($categories) && $categories->isNotEmpty())
            <div class="mt-12 max-w-2xl mx-auto">
                <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold mb-4">Browse Categories</p>
                <div class="flex flex-wrap gap-2 justify-center">
                    @foreach ($categories as $category)
                    <a href="{{ route('categories.show', $category) }}"
                       class="border border-indigo-200 text-indigo-600 hover:bg-indigo-50 text-sm font-medium px-4 py-2 rounded-xl transition">
                        {{ $category->name }}
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        @endif

    </div>

    <x-front.footer />

    <script>
        function setView(type) {
            document.getElementById('grid-view').classList.toggle('hidden', type !== 'grid');
            document.getElementById('list-view').classList.toggle('hidden', type !== 'list');
            document.getElementById('view-grid').classList.toggle('active', type === 'grid');
            document.getElementById('view-list').classList.toggle('active', type === 'list');
            document.getElementById('view-grid').classList.toggle('text-gray-400', type !== 'grid');
            document.getElementById('view-list').classList.toggle('text-gray-400', type !== 'list');
        }
    </script>

</body>
</html>