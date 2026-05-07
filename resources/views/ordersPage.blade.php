<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} — Order #{{ $order->order_number }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .step-done  { background: linear-gradient(135deg, #4f46e5, #7c3aed); }
        .step-active { background: linear-gradient(135deg, #4f46e5, #7c3aed); box-shadow: 0 0 0 4px rgba(99,102,241,0.2); }
        .step-pending { background: #e5e7eb; }
        .step-line-done { background: linear-gradient(to right, #4f46e5, #7c3aed); }
        .step-line-pending { background: #e5e7eb; }
        @keyframes fadeUp { from { opacity:0; transform:translateY(12px); } to { opacity:1; transform:translateY(0); } }
        .fade-up { animation: fadeUp 0.4s ease both; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

    <x-front.header />

    {{-- Banner --}}
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-indigo-200 text-sm mb-1">Order Details</p>
                    <h1 class="text-3xl font-bold text-white">#{{ $order->order_number }}</h1>
                    <p class="text-indigo-200 text-sm mt-1">Placed on {{ $order->created_at->format('F d, Y \a\t h:i A') }}</p>
                </div>
                <a href="{{ route('orders.index') }}"
                   class="bg-white/15 hover:bg-white/25 text-white text-sm font-medium px-4 py-2 rounded-lg backdrop-blur-sm transition flex items-center gap-2">
                    <i class="fas fa-arrow-left text-xs"></i> My Orders
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Flash Messages --}}
        @if (session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 text-sm rounded-xl px-5 py-3 flex items-center gap-2 fade-up">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        {{-- Order Status Tracker --}}
        @php
            $steps = ['placed' => 'Order Placed', 'processing' => 'Processing', 'shipped' => 'Shipped', 'delivered' => 'Delivered'];
            $stepOrder = array_keys($steps);
            $currentIndex = array_search($order->status, $stepOrder);
            if ($order->status === 'cancelled') $currentIndex = -1;
        @endphp

        @if ($order->status !== 'cancelled')
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-6 fade-up">
            <h2 class="text-base font-semibold text-gray-800 mb-6">Order Status</h2>
            <div class="flex items-center">
                @foreach ($steps as $key => $label)
                    @php $idx = array_search($key, $stepOrder); @endphp

                    {{-- Step --}}
                    <div class="flex flex-col items-center flex-shrink-0">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm
                            {{ $idx < $currentIndex ? 'step-done' : ($idx === $currentIndex ? 'step-active' : 'step-pending') }}">
                            @if ($idx < $currentIndex)
                                <i class="fas fa-check text-xs"></i>
                            @elseif ($idx === $currentIndex)
                                <i class="fas fa-circle text-xs"></i>
                            @else
                                <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
                            @endif
                        </div>
                        <p class="text-xs mt-2 font-medium text-center
                            {{ $idx <= $currentIndex ? 'text-indigo-600' : 'text-gray-400' }}">
                            {{ $label }}
                        </p>
                        @if ($key === 'placed')
                            <p class="text-xs text-gray-400 mt-0.5">{{ $order->created_at->format('M d') }}</p>
                        @elseif ($key === 'delivered' && $order->delivered_at)
                            <p class="text-xs text-gray-400 mt-0.5">{{ $order->delivered_at->format('M d') }}</p>
                        @endif
                    </div>

                    {{-- Connector Line --}}
                    @if (!$loop->last)
                    <div class="flex-1 h-1 mx-2 rounded-full
                        {{ $idx < $currentIndex ? 'step-line-done' : 'step-line-pending' }}">
                    </div>
                    @endif
                @endforeach
            </div>

            @if ($order->tracking_number)
            <div class="mt-5 pt-4 border-t border-gray-100 flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-400">Tracking Number</p>
                    <p class="text-sm font-semibold text-gray-800 mt-0.5">{{ $order->tracking_number }}</p>
                </div>
                <a href="#" class="bg-indigo-50 text-indigo-600 hover:bg-indigo-100 px-4 py-2 rounded-lg text-xs font-semibold transition flex items-center gap-2">
                    <i class="fas fa-truck"></i> Track Package
                </a>
            </div>
            @endif
        </div>
        @else
        <div class="bg-red-50 border border-red-200 rounded-2xl p-5 mb-6 flex items-center gap-4 fade-up">
            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-times-circle text-red-500"></i>
            </div>
            <div>
                <p class="font-semibold text-red-700">Order Cancelled</p>
                <p class="text-sm text-red-500 mt-0.5">This order was cancelled on {{ $order->updated_at->format('M d, Y') }}.</p>
            </div>
        </div>
        @endif

        <div class="grid md:grid-cols-3 gap-6">

            {{-- Left: Items --}}
            <div class="md:col-span-2 space-y-4">

                {{-- Order Items --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden fade-up">
                    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                        <h2 class="text-base font-semibold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-box text-indigo-500 text-sm"></i>
                            Items ({{ $order->items->count() }})
                        </h2>
                    </div>

                    <div class="divide-y divide-gray-50">
                        @foreach ($order->items as $item)
                        <div class="flex items-center gap-4 px-6 py-4">
                            <div class="w-16 h-16 rounded-xl overflow-hidden border border-gray-100 flex-shrink-0 bg-gray-50">
                                @if ($item->product->image_path)
                                    <img src="{{ asset('storage/' . $item->product->image_path) }}"
                                         alt="{{ $item->product->name }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fas fa-image text-gray-300"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <a href="{{ route('products.show', $item->product) }}"
                                   class="text-sm font-medium text-gray-800 hover:text-indigo-600 transition line-clamp-1">
                                    {{ $item->product->name }}
                                </a>
                                @if ($item->variant)
                                    <p class="text-xs text-gray-400 mt-0.5">{{ $item->variant }}</p>
                                @endif
                                <p class="text-xs text-gray-400 mt-0.5">
                                    ${{ number_format($item->price, 2) }} × {{ $item->quantity }}
                                </p>
                            </div>
                            <div class="text-right flex-shrink-0">
                                <p class="text-sm font-bold text-gray-800">
                                    ${{ number_format($item->price * $item->quantity, 2) }}
                                </p>
                                @if ($order->status === 'delivered')
                                <a href="{{ route('products.show', $item->product) }}#reviews"
                                   class="text-xs text-indigo-500 hover:underline mt-1 block">
                                    Leave a Review
                                </a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Shipping Info --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 fade-up">
                    <h2 class="text-base font-semibold text-gray-800 mb-4 flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-indigo-500 text-sm"></i> Shipping Address
                    </h2>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        {{ $order->shipping_name ?? auth()->user()->name }}<br>
                        {{ $order->shipping_address }}<br>
                        @if ($order->shipping_city) {{ $order->shipping_city }}, @endif
                        @if ($order->shipping_country) {{ $order->shipping_country }} @endif
                        @if ($order->shipping_zip) &nbsp;{{ $order->shipping_zip }} @endif
                    </p>
                    @if ($order->shipping_phone)
                    <p class="text-xs text-gray-400 mt-2 flex items-center gap-1">
                        <i class="fas fa-phone"></i> {{ $order->shipping_phone }}
                    </p>
                    @endif
                </div>
            </div>

            {{-- Right: Summary + Actions --}}
            <div class="space-y-4">

                {{-- Order Summary --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 fade-up">
                    <h2 class="text-base font-semibold text-gray-800 mb-4">Order Summary</h2>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span>${{ number_format($order->subtotal ?? $order->total, 2) }}</span>
                        </div>
                        @if ($order->discount > 0)
                        <div class="flex justify-between text-green-600">
                            <span>Discount</span>
                            <span>−${{ number_format($order->discount, 2) }}</span>
                        </div>
                        @endif
                        <div class="flex justify-between text-gray-600">
                            <span>Shipping</span>
                            <span>
                                @if (($order->shipping_cost ?? 0) == 0)
                                    <span class="text-green-600 font-medium">Free</span>
                                @else
                                    ${{ number_format($order->shipping_cost, 2) }}
                                @endif
                            </span>
                        </div>
                        @if (($order->tax ?? 0) > 0)
                        <div class="flex justify-between text-gray-600">
                            <span>Tax</span>
                            <span>${{ number_format($order->tax, 2) }}</span>
                        </div>
                        @endif
                        <div class="flex justify-between font-bold text-gray-900 text-base pt-3 border-t border-gray-100">
                            <span>Total</span>
                            <span>${{ number_format($order->total, 2) }}</span>
                        </div>
                    </div>
                </div>

                {{-- Payment Info --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 fade-up">
                    <h2 class="text-base font-semibold text-gray-800 mb-4 flex items-center gap-2">
                        <i class="fas fa-credit-card text-indigo-500 text-sm"></i> Payment
                    </h2>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-7 bg-indigo-50 rounded-lg flex items-center justify-center">
                            <i class="fas fa-credit-card text-indigo-500 text-xs"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">{{ ucfirst($order->payment_method ?? 'Card') }}</p>
                            <p class="text-xs text-gray-400">
                                @if ($order->status === 'cancelled') Refunded
                                @else Paid on {{ $order->created_at->format('M d, Y') }} @endif
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 space-y-3 fade-up">
                    <h2 class="text-base font-semibold text-gray-800 mb-1">Actions</h2>

                    @if ($order->status === 'delivered')
                    <a href="{{ route('orders.invoice', $order) }}"
                       class="w-full flex items-center justify-center gap-2 border border-indigo-200 text-indigo-600 hover:bg-indigo-50 px-4 py-2.5 rounded-xl text-sm font-medium transition">
                        <i class="fas fa-file-invoice text-xs"></i> Download Invoice
                    </a>
                    <a href="{{ route('orders.reorder', $order) }}"
                       class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2.5 rounded-xl text-sm font-semibold hover:opacity-90 transition">
                        <i class="fas fa-redo text-xs"></i> Reorder
                    </a>
                    @endif

                    @if ($order->status === 'processing')
                    <form action="{{ route('orders.cancel', $order) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to cancel this order?')">
                        @csrf @method('PATCH')
                        <button type="submit"
                                class="w-full flex items-center justify-center gap-2 border border-red-200 text-red-600 hover:bg-red-50 px-4 py-2.5 rounded-xl text-sm font-medium transition">
                            <i class="fas fa-times text-xs"></i> Cancel Order
                        </button>
                    </form>
                    @endif

                    <a href="{{ route('orders.index') }}"
                       class="w-full flex items-center justify-center gap-2 border border-gray-200 text-gray-600 hover:bg-gray-50 px-4 py-2.5 rounded-xl text-sm font-medium transition">
                        <i class="fas fa-list text-xs"></i> All Orders
                    </a>
                </div>

                {{-- Need Help --}}
                <div class="bg-indigo-50 rounded-2xl p-5 fade-up">
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-headset text-indigo-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-indigo-800">Need Help?</p>
                            <p class="text-xs text-indigo-500 mt-0.5 leading-relaxed">Having an issue with this order? Our support team is here 24/7.</p>
                            <a href="{{ route('contact') }}?order={{ $order->order_number }}"
                               class="inline-block mt-2 text-xs font-semibold text-indigo-600 hover:underline">
                                Contact Support →
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <x-front.footer />

</body>
</html>
