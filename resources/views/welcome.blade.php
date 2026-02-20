<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Shop - E-commerce Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-indigo-600">ModernShop</h1>
                </div>
                
                <!-- Search Bar -->
                <div class="hidden md:flex flex-1 max-w-md mx-8">
                    <div class="relative w-full">
                        <input type="text" placeholder="Search products..." 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                    </div>
                </div>
                
                <!-- Nav Links -->
                <div class="flex items-center space-x-6">
                    <a href="{{ route('showLogin') }}" class="hidden md:block text-gray-700 hover:text-indigo-600">Login</a>
                    <a href="{{route('showRegister')}}" class="hidden md:block text-gray-700 hover:text-indigo-600">Sign Up</a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600 relative">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-indigo-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                    </a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600">
                        <i class="fas fa-user text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

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
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition cursor-pointer group">
                    <div class="h-64 bg-gradient-to-br from-pink-400 to-rose-500 flex items-center justify-center">
                        <i class="fas fa-tshirt text-7xl text-white group-hover:scale-110 transition"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Women's Fashion</h3>
                        <p class="text-gray-600 mb-4">Explore the latest trends</p>
                        <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-700">Shop Now →</a>
                    </div>
                </div>
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition cursor-pointer group">
                    <div class="h-64 bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center">
                        <i class="fas fa-user-tie text-7xl text-white group-hover:scale-110 transition"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Men's Fashion</h3>
                        <p class="text-gray-600 mb-4">Classic & modern styles</p>
                        <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-700">Shop Now →</a>
                    </div>
                </div>
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition cursor-pointer group">
                    <div class="h-64 bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center">
                        <i class="fas fa-gem text-7xl text-white group-hover:scale-110 transition"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Accessories</h3>
                        <p class="text-gray-600 mb-4">Complete your look</p>
                        <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-700">Shop Now →</a>
                    </div>
                </div>
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
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition group">
                    <div class="relative h-64 bg-gray-200 flex items-center justify-center overflow-hidden">
                        <i class="fas fa-image text-6xl text-gray-400"></i>
                        <div class="absolute top-4 right-4">
                            <button class="bg-white w-10 h-10 rounded-full shadow-md flex items-center justify-center hover:bg-indigo-600 hover:text-white transition">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            -20%
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold mb-2 group-hover:text-indigo-600 transition">Classic White Sneakers</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star-half-alt text-sm"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(128)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-gray-400 line-through text-sm">$99.99</span>
                                <span class="text-xl font-bold text-indigo-600 ml-2">$79.99</span>
                            </div>
                            <button class="bg-indigo-600 text-white w-10 h-10 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition group">
                    <div class="relative h-64 bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-image text-6xl text-gray-400"></i>
                        <div class="absolute top-4 right-4">
                            <button class="bg-white w-10 h-10 rounded-full shadow-md flex items-center justify-center hover:bg-indigo-600 hover:text-white transition">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold mb-2 group-hover:text-indigo-600 transition">Leather Backpack</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(89)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-indigo-600">$149.99</span>
                            <button class="bg-indigo-600 text-white w-10 h-10 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition group">
                    <div class="relative h-64 bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-image text-6xl text-gray-400"></i>
                        <div class="absolute top-4 right-4">
                            <button class="bg-white w-10 h-10 rounded-full shadow-md flex items-center justify-center hover:bg-indigo-600 hover:text-white transition">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        <div class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            New
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold mb-2 group-hover:text-indigo-600 transition">Wireless Headphones</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="far fa-star text-sm"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(45)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-indigo-600">$199.99</span>
                            <button class="bg-indigo-600 text-white w-10 h-10 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition group">
                    <div class="relative h-64 bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-image text-6xl text-gray-400"></i>
                        <div class="absolute top-4 right-4">
                            <button class="bg-white w-10 h-10 rounded-full shadow-md flex items-center justify-center hover:bg-indigo-600 hover:text-white transition">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            -15%
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold mb-2 group-hover:text-indigo-600 transition">Minimalist Watch</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(203)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-gray-400 line-through text-sm">$299.99</span>
                                <span class="text-xl font-bold text-indigo-600 ml-2">$254.99</span>
                            </div>
                            <button class="bg-indigo-600 text-white w-10 h-10 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
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
    <footer class="bg-gray-900 text-gray-300 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-white text-xl font-bold mb-4">ModernShop</h3>
                    <p class="text-gray-400 mb-4">Your one-stop destination for quality products and amazing deals.</p>
                    <div class="flex gap-4">
                        <a href="#" class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-indigo-600 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-indigo-600 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-indigo-600 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Shop</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition">Women's Fashion</a></li>
                        <li><a href="#" class="hover:text-white transition">Men's Fashion</a></li>
                        <li><a href="#" class="hover:text-white transition">Accessories</a></li>
                        <li><a href="#" class="hover:text-white transition">Sale</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Customer Service</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Shipping Info</a></li>
                        <li><a href="#" class="hover:text-white transition">Returns</a></li>
                        <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Company</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Careers</a></li>
                        <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white transition">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center">
                <p>&copy; 2026 ModernShop. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>