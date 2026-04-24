<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><{{ config('app_name') }}/title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    
    <x-front.header/>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-5xl font-bold mb-6">Summer Collection 2026</h2>
                    <p class="text-xl mb-8 text-indigo-100">Discover the latest trends and timeless classics. Up to 50% off on selected items.</p>
                    <div class="flex gap-4">
                        <button class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                            Shop Now
                        </button>
                        <button class="border-2 border-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition">
                            Learn More
                        </button>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 h-80 flex items-center justify-center">
                        <i class="fas fa-shopping-bag text-9xl text-white/30"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-truck text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="font-semibold mb-2">Free Shipping</h3>
                    <p class="text-gray-600 text-sm">On orders over $50</p>
                </div>
                <div class="text-center">
                    <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-undo text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="font-semibold mb-2">Easy Returns</h3>
                    <p class="text-gray-600 text-sm">30-day return policy</p>
                </div>
                <div class="text-center">
                    <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lock text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="font-semibold mb-2">Secure Payment</h3>
                    <p class="text-gray-600 text-sm">100% secure checkout</p>
                </div>
                <div class="text-center">
                    <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="font-semibold mb-2">24/7 Support</h3>
                    <p class="text-gray-600 text-sm">Always here to help</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Categories -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">Shop by Category</h2>
            <div class="grid md:grid-cols-3 gap-8">
               @foreach ($categories as $category)
                   <x-front.category-card :name="$category->name" :image="$category->image_path"/>
               @endforeach
                    
               
                
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-3xl font-bold">Trending Products</h2>
                <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-700">View All →</a>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Product 1 -->
                <x-front.product-card/>

            </div>
        </div>
    </section>

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