<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} — Shopping Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .cart-item { transition: opacity 0.3s, transform 0.3s; }
        .cart-item.removing { opacity: 0; transform: translateX(20px); }
        @keyframes fadeUp { from { opacity:0; transform:translateY(12px); } to { opacity:1; transform:translateY(0); } }
        .fade-up { animation: fadeUp 0.35s ease both; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

    <x-front.header />

    {{-- Breadcrumb --}}
    <div class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-indigo-600 transition">Home</a>
                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                <span class="text-gray-900 font-medium">Shopping Cart</span>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Flash Messages --}}
        @if (session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 text-sm rounded-xl px-5 py-3 flex items-center gap-2 fade-up">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 text-sm rounded-xl px-5 py-3 flex items-center gap-2 fade-up">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
        @endif

        {{-- Page Header --}}
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Shopping Cart</h1>
                <p class="text-gray-500 mt-1 text-sm">
                    {{ $cartItems->count() }} {{ Str::plural('item', $cartItems->count()) }} in your cart
                </p>
            </div>
            @if ($cartItems->isNotEmpty())
            <form action="{{ route('cart.clear') }}" method="POST"
                  onsubmit="return confirm('Remove all items from your cart?')">
                @csrf @method('DELETE')
                <button type="submit"
                        class="text-sm text-red-500 hover:text-red-700 font-medium flex items-center gap-1.5 transition">
                    <i class="fas fa-trash text-xs"></i> Clear Cart
                </button>
            </form>
            @endif
        </div>

        @if ($cartItems->isNotEmpty())

        <div class="grid lg:grid-cols-3 gap-8">

            {{-- ── CART ITEMS ──────────────────────────────────────── --}}
            <div class="lg:col-span-2 space-y-4">

                @foreach ($cartItems as $item)
                @php $product = $item->product; @endphp
                <div class="cart-item bg-white rounded-2xl border border-gray-100 shadow-sm p-5 fade-up" id="item-{{ $item->id }}">
                    <div class="flex items-start gap-5">

                        {{-- Product Image --}}
                        <a href="{{ route('product.show', $product) }}"
                           class="w-24 h-24 sm:w-28 sm:h-28 rounded-xl overflow-hidden bg-gray-50 border border-gray-100 flex-shrink-0 flex items-center justify-center">
                            @if ($product->primaryImage?->image_path)
                                <img src="{{ asset('storage/' . $product->primaryImage->image_path) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover">
                            @else
                                <i class="fas fa-image text-gray-300 text-3xl"></i>
                            @endif
                        </a>

                        {{-- Details --}}
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0">
                                    <a href="{{ route('product.show', $product) }}"
                                       class="text-base font-semibold text-gray-800 hover:text-indigo-600 transition line-clamp-2 leading-snug">
                                        {{ $product->name }}
                                    </a>
                                    @if ($product->category)
                                    <p class="text-xs text-indigo-500 font-medium mt-0.5 uppercase tracking-wide">
                                        {{ $product->category->name }}
                                    </p>
                                    @endif
                                    @if ($item->variant)
                                    <p class="text-xs text-gray-400 mt-1">{{ $item->variant }}</p>
                                    @endif
                                </div>

                                {{-- Remove button --}}
                                <form action="{{ route('cart.remove', $item) }}" method="POST" class="flex-shrink-0">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="w-8 h-8 text-gray-300 hover:text-red-500 hover:bg-red-50 rounded-lg flex items-center justify-center transition">
                                        <i class="fas fa-trash text-sm"></i>
                                    </button>
                                </form>
                            </div>

                            {{-- Stock status --}}
                            <div class="mt-2">
                                @if ($product->quantity > 0)
                                    @if ($product->quantity <= 5)
                                    <span class="text-xs text-yellow-600 flex items-center gap-1">
                                        <i class="fas fa-exclamation-circle"></i> Only {{ $product->quantity }} left
                                    </span>
                                    @else
                                    <span class="text-xs text-green-600 flex items-center gap-1">
                                        <i class="fas fa-check-circle"></i> In Stock
                                    </span>
                                    @endif
                                @else
                                <span class="text-xs text-red-500 flex items-center gap-1">
                                    <i class="fas fa-times-circle"></i> Out of Stock
                                </span>
                                @endif
                            </div>

                            {{-- Quantity & Price --}}
                            <div class="flex items-center justify-between mt-3 flex-wrap gap-3">

                                {{-- Quantity Controls --}}
                                <div class="flex items-center border border-gray-200 rounded-xl overflow-hidden">
                                    <form action="{{ route('cart.decrement', $item) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button type="submit"
                                                class="px-3 py-2 hover:bg-gray-100 text-gray-600 transition disabled:opacity-30"
                                                {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                            <i class="fas fa-minus text-xs"></i>
                                        </button>
                                    </form>
                                    <span class="w-10 text-center text-sm font-semibold text-gray-800 border-x border-gray-200 py-2">
                                        {{ $item->quantity }}
                                    </span>
                                    <form action="{{ route('cart.increment', $item) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button type="submit"
                                                class="px-3 py-2 hover:bg-gray-100 text-gray-600 transition"
                                                {{ $item->quantity >= $product->quantity ? 'disabled' : '' }}>
                                            <i class="fas fa-plus text-xs"></i>
                                        </button>
                                    </form>
                                </div>

                                {{-- Price --}}
                                <div class="text-right">
                                    @if ($product->sale_price && $product->sale_price < $product->price)
                                    <p class="text-xs text-gray-400 line-through">
                                        KSH {{ number_format($product->price * $item->quantity) }}
                                    </p>
                                    <p class="text-lg font-bold text-indigo-600">
                                        KSH {{ number_format($product->sale_price * $item->quantity) }}
                                    </p>
                                    @else
                                    <p class="text-lg font-bold text-indigo-600">
                                        KSH {{ number_format($product->price * $item->quantity) }}
                                    </p>
                                    @endif
                                    @if ($item->quantity > 1)
                                    <p class="text-xs text-gray-400">
                                        KSH {{ number_format($product->sale_price ?? $product->price) }} each
                                    </p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- Continue Shopping --}}
                <div class="pt-2">
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-700 text-sm font-medium transition">
                        <i class="fas fa-arrow-left text-xs"></i> Continue Shopping
                    </a>
                </div>
            </div>

            {{-- ── ORDER SUMMARY ───────────────────────────────────── --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sticky top-24">
                    <h2 class="text-lg font-bold text-gray-800 mb-5">Order Summary</h2>

                    {{-- Promo Code --}}
                    @if (!session('promo_applied'))
                    <div class="mb-5">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Promo Code</label>
                        <form action="{{ route('cart.promo') }}" method="POST" class="flex gap-2">
                            @csrf
                            <input type="text" name="promo_code"
                                   placeholder="Enter code"
                                   class="flex-1 px-3 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400 transition">
                            <button type="submit"
                                    class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold rounded-xl transition">
                                Apply
                            </button>
                        </form>
                        @error('promo_code')
                        <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                            <i class="fas fa-times-circle"></i> {{ $message }}
                        </p>
                        @enderror
                    </div>
                    @else
                    <div class="mb-5 bg-green-50 border border-green-200 rounded-xl px-4 py-3 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-green-700 text-sm font-medium">
                            <i class="fas fa-tag text-xs"></i>
                            <span>{{ session('promo_code') }} — {{ session('promo_discount') }}% off</span>
                        </div>
                        <form action="{{ route('cart.promo.remove') }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-green-500 hover:text-green-700 text-xs transition">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </div>
                    @endif

                    {{-- Price Breakdown --}}
                    @php
                        $subtotal = $cartItems->sum(fn($item) =>
                            ($item->product->sale_price ?? $item->product->price) * $item->quantity
                        );
                        $discount = session('promo_applied')
                            ? $subtotal * (session('promo_discount') / 100)
                            : 0;
                        $afterDiscount = $subtotal - $discount;
                        $shipping = $afterDiscount >= 5000 ? 0 : 350;
                        $total = $afterDiscount + $shipping;
                    @endphp

                    <div class="space-y-3 text-sm mb-5">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal ({{ $cartItems->sum('quantity') }} items)</span>
                            <span>KSH {{ number_format($subtotal) }}</span>
                        </div>
                        @if ($discount > 0)
                        <div class="flex justify-between text-green-600">
                            <span>Discount</span>
                            <span>− KSH {{ number_format($discount) }}</span>
                        </div>
                        @endif
                        <div class="flex justify-between text-gray-600">
                            <span>Shipping</span>
                            <span>
                                @if ($shipping === 0)
                                    <span class="text-green-600 font-medium">Free</span>
                                @else
                                    KSH {{ number_format($shipping) }}
                                @endif
                            </span>
                        </div>
                        <div class="flex justify-between font-bold text-gray-900 text-base pt-3 border-t border-gray-100">
                            <span>Total</span>
                            <span class="text-indigo-600">KSH {{ number_format($total) }}</span>
                        </div>
                    </div>

                    {{-- Free shipping nudge --}}
                    @if ($shipping > 0)
                    @php $remaining = 5000 - $afterDiscount; @endphp
                    <div class="mb-5 bg-indigo-50 rounded-xl p-3 text-xs text-indigo-700 flex items-center gap-2">
                        <i class="fas fa-truck text-indigo-400"></i>
                        Add <strong>KSH {{ number_format(max(0, $remaining)) }}</strong> more for free shipping!
                    </div>
                    @else
                    <div class="mb-5 bg-green-50 rounded-xl p-3 text-xs text-green-700 flex items-center gap-2">
                        <i class="fas fa-truck text-green-400"></i>
                        You qualify for <strong>free shipping!</strong>
                    </div>
                    @endif

                    {{-- Checkout CTA --}}
                    <a href="{{ route('checkout.index') }}"
                       class="w-full block text-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 rounded-xl text-sm font-bold hover:opacity-90 transition mb-3">
                        <i class="fas fa-lock mr-2 text-xs"></i> Proceed to Checkout
                    </a>

                    {{-- Continue as guest or pay options --}}
                    <div class="text-center text-xs text-gray-400 flex items-center justify-center gap-2 mt-2">
                        <i class="fas fa-shield-alt text-gray-300"></i>
                        Secure checkout — SSL encrypted
                    </div>
                </div>
            </div>
        </div>

        {{-- ── YOU MAY ALSO LIKE ───────────────────────────────── --}}
        @if (isset($suggestedProducts) && $suggestedProducts->isNotEmpty())
        <div class="mt-14">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">You May Also Like</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach ($suggestedProducts->take(4) as $product)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-md transition group">
                    <div class="relative h-44 bg-gray-50 overflow-hidden">
                        @if ($product->primaryImage?->image_path)
                            <img src="{{ asset('storage/' . $product->primaryImage->image_path) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <i class="fas fa-image text-3xl text-gray-200"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <a href="{{ route('product.show', $product) }}"
                           class="text-sm font-semibold text-gray-800 hover:text-indigo-600 transition line-clamp-1">
                            {{ $product->name }}
                        </a>
                        <div class="flex items-center justify-between mt-2.5">
                            <span class="text-base font-bold text-indigo-600">
                                KSH {{ number_format($product->sale_price ?? $product->price) }}
                            </span>
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit"
                                        class="w-9 h-9 bg-indigo-100 hover:bg-indigo-600 text-indigo-600 hover:text-white rounded-xl flex items-center justify-center transition text-xs">
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

        {{-- ── EMPTY STATE ─────────────────────────────────────── --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm py-24 text-center fade-up max-w-lg mx-auto">
            <div class="relative w-24 h-24 mx-auto mb-6">
                <div class="w-24 h-24 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-full flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-4xl text-indigo-300"></i>
                </div>
                <div class="absolute -bottom-1 -right-1 w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center">
                    <i class="fas fa-plus text-white text-xs"></i>
                </div>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Your cart is empty</h3>
            <p class="text-gray-400 text-sm mb-8 max-w-xs mx-auto">
                Looks like you haven't added anything yet. Browse our products and find something you love!
            </p>
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-3 rounded-xl text-sm font-semibold hover:opacity-90 transition">
                <i class="fas fa-shopping-bag text-xs"></i> Start Shopping
            </a>
        </div>

        @endif

    </div>

    <x-front.footer />

</body>
</html>
