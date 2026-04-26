<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} — {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">

    <!-- Navigation -->
    <x-front.header/>

    <!-- Category Hero / Breadcrumb Banner -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <!-- Breadcrumb -->
                    <nav class="text-indigo-200 text-sm mb-3 flex items-center gap-2">
                        <a href="{{ url('/') }}" class="hover:text-white transition">Home</a>
                        <span><i class="fas fa-chevron-right text-xs"></i></span>
                        {{-- <a href="{{ route('categories.index') }}" class="hover:text-white transition">Categories</a> --}}
                        <span><i class="fas fa-chevron-right text-xs"></i></span>
                        <span class="text-white font-medium">{{ $category->name }}</span>
                    </nav>

                    <h1 class="text-4xl font-bold mb-2">{{ $category->name }}</h1>

                    @if($category->description)
                        <p class="text-indigo-100 text-lg max-w-xl">{{ $category->description }}</p>
                    @endif

                    <p class="text-indigo-200 text-sm mt-2">
                        {{count($products) }} {{ Str::plural('product', count($products)) }} found
                    </p>
                </div>

                @if($category->image_path)
                    <div class="hidden md:flex items-center justify-center bg-white/10 backdrop-blur-sm rounded-2xl p-6 w-40 h-40 shrink-0">
                        <img src="{{ asset($category->image_path) }}" alt="{{ $category->name }}"
                             class="w-full h-full object-contain">
                    </div>
                @else
                    <div class="hidden md:flex items-center justify-center bg-white/10 backdrop-blur-sm rounded-2xl p-6 w-40 h-40 shrink-0">
                        <i class="fas fa-tag text-6xl text-white/30"></i>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Filters & Products -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- Sidebar Filters -->
                <aside class="lg:w-64 shrink-0">
                    {{-- action="{{ route('categories.show', $category->slug) }}" --}}
                    {{-- <form method="GET" id="filter-form">

                        <!-- Sort -->
                        <div class="bg-white rounded-xl shadow-sm p-5 mb-5">
                            <h3 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                <i class="fas fa-sort text-indigo-600 text-sm"></i> Sort By
                            </h3>
                            <select name="sort"
                                    onchange="document.getElementById('filter-form').submit()"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="latest"      {{ request('sort') === 'latest'      ? 'selected' : '' }}>Newest First</option>
                                <option value="price_asc"   {{ request('sort') === 'price_asc'   ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_desc"  {{ request('sort') === 'price_desc'  ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="popular"     {{ request('sort') === 'popular'     ? 'selected' : '' }}>Most Popular</option>
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div class="bg-white rounded-xl shadow-sm p-5 mb-5">
                            <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                                <i class="fas fa-tag text-indigo-600 text-sm"></i> Price Range
                            </h3>
                            <div class="flex items-center gap-2 mb-3">
                                <div class="flex-1">
                                    <label class="text-xs text-gray-500 mb-1 block">Min ($)</label>
                                    <input type="number" name="min_price" value="{{ request('min_price') }}"
                                           placeholder="0"
                                           class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                </div>
                                <span class="text-gray-400 mt-5">–</span>
                                <div class="flex-1">
                                    <label class="text-xs text-gray-500 mb-1 block">Max ($)</label>
                                    <input type="number" name="max_price" value="{{ request('max_price') }}"
                                           placeholder="999"
                                           class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                </div>
                            </div>
                        </div>

                        <!-- In Stock -->
                        <div class="bg-white rounded-xl shadow-sm p-5 mb-5">
                            <h3 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                <i class="fas fa-box-open text-indigo-600 text-sm"></i> Availability
                            </h3>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="in_stock" value="1"
                                       {{ request('in_stock') ? 'checked' : '' }}
                                       onchange="document.getElementById('filter-form').submit()"
                                       class="w-4 h-4 accent-indigo-600">
                                <span class="text-sm text-gray-700">In Stock Only</span>
                            </label>
                        </div>

                        <!-- Apply / Reset -->
                        <div class="flex gap-3">
                            <button type="submit"
                                    class="flex-1 bg-indigo-600 text-white py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 transition">
                                Apply
                            </button>
                            <a href="{{ route('categories.show', $category->slug) }}"
                               class="flex-1 text-center border border-gray-300 text-gray-600 py-2 rounded-lg text-sm font-semibold hover:bg-gray-100 transition">
                                Reset
                            </a>
                        </div>

                    </form> --}}

                    <!-- Subcategories (if any) -->
                    {{-- @if($category->children && $category->children->count())
                        <div class="bg-white rounded-xl shadow-sm p-5 mt-5">
                            <h3 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                <i class="fas fa-list text-indigo-600 text-sm"></i> Sub-categories
                            </h3>
                            <ul class="space-y-2">
                                @foreach($category->children as $child)
                                    <li>
                                        <a href="{{ route('categories.show', $child->slug) }}"
                                           class="flex items-center justify-between text-sm text-gray-600 hover:text-indigo-600 transition py-1">
                                            <span>{{ $child->name }}</span>
                                            <span class="text-xs text-gray-400">{{ $child->products_count ?? '' }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                </aside>

                <!-- Products Grid -->
                <div class="flex-1">

                    @if($products->isEmpty())
                        <!-- Empty State -->
                        <div class="bg-white rounded-2xl shadow-sm flex flex-col items-center justify-center py-24 text-center px-8">
                            <div class="bg-indigo-100 w-20 h-20 rounded-full flex items-center justify-center mb-5">
                                <i class="fas fa-box-open text-3xl text-indigo-400"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">No Products Found</h3>
                            <p class="text-gray-500 mb-6">Try adjusting your filters or browse other categories.</p>
                            <a href="{{ route('categories.index') }}"
                               class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
                                Browse Categories
                            </a>
                        </div>
                    @else

                        <!-- Active Filters Summary -->
                        @if(request()->hasAny(['min_price','max_price','in_stock','sort']))
                            <div class="flex flex-wrap items-center gap-2 mb-5">
                                <span class="text-sm text-gray-500 mr-1">Active filters:</span>
                                @if(request('min_price') || request('max_price'))
                                    <span class="inline-flex items-center gap-1 bg-indigo-100 text-indigo-700 text-xs px-3 py-1 rounded-full">
                                        ${{ request('min_price', '0') }} – ${{ request('max_price', '∞') }}
                                        <a href="{{ request()->fullUrlWithoutQuery(['min_price','max_price']) }}" class="ml-1 hover:text-indigo-900"><i class="fas fa-times"></i></a>
                                    </span>
                                @endif
                                @if(request('in_stock'))
                                    <span class="inline-flex items-center gap-1 bg-indigo-100 text-indigo-700 text-xs px-3 py-1 rounded-full">
                                        In Stock
                                        <a href="{{ request()->fullUrlWithoutQuery(['in_stock']) }}" class="ml-1 hover:text-indigo-900"><i class="fas fa-times"></i></a>
                                    </span>
                                @endif
                            </div>
                        @endif

                        <!-- Grid -->
                        <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-6">
                            @foreach($products as $product)
                                <x-front.product-card :product="$product"/>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        {{-- @if($products->hasPages())
                            <div class="mt-10 flex justify-center">
                                {{ $products->withQueryString()->links() }}
                            </div>
                        @endif --}}

                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Related Categories -->
    @if(isset($relatedCategories) && $relatedCategories->count())
        <section class="py-14 bg-white border-t border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold mb-8">Other Categories You Might Like</h2>
                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($relatedCategories as $related)
                        <x-front.category-card :name="$related->name" :image="$related->image_path"/>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Newsletter -->
    <section class="py-16 bg-indigo-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto">
                <h2 class="text-3xl font-bold mb-4">Subscribe to Our Newsletter</h2>
                <p class="text-indigo-100 mb-8">Get exclusive offers and updates delivered to your inbox</p>
                <div class="flex gap-4 max-w-md mx-auto">
                    <input type="email" placeholder="Enter your email"
                           class="flex-1 px-6 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white">
                    <button class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <x-front.footer/>

</body>
</html>
