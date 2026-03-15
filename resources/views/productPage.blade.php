<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classic White Sneakers - ModernShop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .thumbnail-active {
            border-color: #4F46E5;
            border-width: 2px;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    
    <x-front.header/>
    <!-- Breadcrumb -->
    <div class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center space-x-2 text-sm">
                <a href="ecommerce-home.html" class="text-gray-500 hover:text-indigo-600">Home</a>
                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                <a href="#" class="text-gray-500 hover:text-indigo-600">Footwear</a>
                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                <span class="text-gray-900 font-medium">Classic White Sneakers</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid lg:grid-cols-2 gap-8 mb-12">
            <!-- Product Images -->
            <div>
                <!-- Main Image -->
                <div class="bg-white rounded-lg shadow-sm mb-4 overflow-hidden">
                    <div id="mainImage" class="aspect-square bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-image text-gray-400 text-9xl"></i>
                    </div>
                </div>
                
                <!-- Thumbnail Images -->
                <div class="grid grid-cols-4 gap-4">
                    <div class="thumbnail-active bg-white rounded-lg shadow-sm overflow-hidden cursor-pointer border-2 border-indigo-600" onclick="changeImage(1)">
                        <div class="aspect-square bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-image text-gray-400 text-2xl"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden cursor-pointer border-2 border-transparent hover:border-gray-300" onclick="changeImage(2)">
                        <div class="aspect-square bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-image text-gray-400 text-2xl"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden cursor-pointer border-2 border-transparent hover:border-gray-300" onclick="changeImage(3)">
                        <div class="aspect-square bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-image text-gray-400 text-2xl"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden cursor-pointer border-2 border-transparent hover:border-gray-300" onclick="changeImage(4)">
                        <div class="aspect-square bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-image text-gray-400 text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <!-- Title & Rating -->
                <div class="mb-4">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Classic White Sneakers</h1>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="ml-2 text-gray-600 text-sm">(4.5)</span>
                        </div>
                        <span class="text-gray-400">|</span>
                        <a href="#reviews" class="text-indigo-600 text-sm hover:underline">128 Reviews</a>
                        <span class="text-gray-400">|</span>
                        <span class="text-sm text-gray-600">SKU: SNK-001</span>
                    </div>
                </div>

                <!-- Price -->
                <div class="mb-6">
                    <div class="flex items-center space-x-3">
                        <span class="text-3xl font-bold text-indigo-600">$79.99</span>
                        <span class="text-xl text-gray-400 line-through">$99.99</span>
                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-semibold">-20%</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-1">Tax included. Shipping calculated at checkout.</p>
                </div>

                <!-- Stock Status -->
                <div class="mb-6">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-check-circle text-green-600"></i>
                        <span class="text-green-600 font-medium">In Stock - Ready to Ship</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-1">Only 15 items left in stock!</p>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <h3 class="font-semibold text-gray-900 mb-2">Description</h3>
                    <p class="text-gray-600">
                        Experience ultimate comfort and style with our Classic White Sneakers. Crafted with premium materials 
                        and designed for everyday wear, these sneakers combine timeless elegance with modern functionality. 
                        Perfect for casual outings or daily commutes.
                    </p>
                </div>

                <!-- Size Selection -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="font-semibold text-gray-900">Size</h3>
                        <a href="#" class="text-sm text-indigo-600 hover:underline">Size Guide</a>
                    </div>
                    <div class="grid grid-cols-5 gap-2">
                        <button class="border-2 border-gray-300 rounded-lg py-2 hover:border-indigo-600 transition">38</button>
                        <button class="border-2 border-gray-300 rounded-lg py-2 hover:border-indigo-600 transition">39</button>
                        <button class="border-2 border-gray-300 rounded-lg py-2 hover:border-indigo-600 transition">40</button>
                        <button class="border-2 border-indigo-600 bg-indigo-50 rounded-lg py-2 font-medium text-indigo-600">42</button>
                        <button class="border-2 border-gray-300 rounded-lg py-2 hover:border-indigo-600 transition">43</button>
                        <button class="border-2 border-gray-300 rounded-lg py-2 hover:border-indigo-600 transition">44</button>
                        <button class="border-2 border-gray-300 rounded-lg py-2 hover:border-indigo-600 transition">45</button>
                        <button class="border-2 border-gray-200 text-gray-400 rounded-lg py-2 cursor-not-allowed">46</button>
                        <button class="border-2 border-gray-200 text-gray-400 rounded-lg py-2 cursor-not-allowed">47</button>
                    </div>
                </div>

                <!-- Color Selection -->
                <div class="mb-6">
                    <h3 class="font-semibold text-gray-900 mb-3">Color</h3>
                    <div class="flex space-x-3">
                        <button class="w-10 h-10 bg-white border-2 border-indigo-600 rounded-full ring-2 ring-indigo-200"></button>
                        <button class="w-10 h-10 bg-black border-2 border-gray-300 rounded-full hover:border-gray-500"></button>
                        <button class="w-10 h-10 bg-blue-500 border-2 border-gray-300 rounded-full hover:border-gray-500"></button>
                        <button class="w-10 h-10 bg-red-500 border-2 border-gray-300 rounded-full hover:border-gray-500"></button>
                    </div>
                </div>

                <!-- Quantity -->
                <div class="mb-6">
                    <h3 class="font-semibold text-gray-900 mb-3">Quantity</h3>
                    <div class="flex items-center border border-gray-300 rounded-lg w-32">
                        <button onclick="decreaseQty()" class="px-4 py-2 hover:bg-gray-100">
                            <i class="fas fa-minus text-sm"></i>
                        </button>
                        <input type="number" id="quantity" value="1" min="1" max="15" class="w-full text-center py-2 border-x border-gray-300 focus:outline-none" readonly>
                        <button onclick="increaseQty()" class="px-4 py-2 hover:bg-gray-100">
                            <i class="fas fa-plus text-sm"></i>
                        </button>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-3 mb-6">
                    <button onclick="addToCart()" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
                        <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                    </button>
                    <button onclick="toggleWishlist()" id="wishlistBtn" class="w-full border-2 border-gray-300 text-gray-700 py-3 rounded-lg font-semibold hover:border-red-500 hover:text-red-500 transition">
                        <i class="far fa-heart mr-2"></i> Add to Wishlist
                    </button>
                </div>

                <!-- Features -->
                <div class="border-t pt-6 space-y-3">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-truck text-indigo-600 mr-3"></i>
                        <span>Free shipping on orders over $50</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-undo text-indigo-600 mr-3"></i>
                        <span>30-day return policy</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-shield-alt text-indigo-600 mr-3"></i>
                        <span>2-year warranty included</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-headset text-indigo-600 mr-3"></i>
                        <span>24/7 customer support</span>
                    </div>
                </div>

                <!-- Share -->
                <div class="border-t pt-6 mt-6">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Share:</span>
                        <div class="flex space-x-3">
                            <a href="#" class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700">
                                <i class="fab fa-facebook-f text-sm"></i>
                            </a>
                            <a href="#" class="w-8 h-8 bg-blue-400 text-white rounded-full flex items-center justify-center hover:bg-blue-500">
                                <i class="fab fa-twitter text-sm"></i>
                            </a>
                            <a href="#" class="w-8 h-8 bg-pink-600 text-white rounded-full flex items-center justify-center hover:bg-pink-700">
                                <i class="fab fa-instagram text-sm"></i>
                            </a>
                            <a href="#" class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center hover:bg-green-700">
                                <i class="fab fa-whatsapp text-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs Section -->
        <div class="bg-white rounded-lg shadow-sm mb-12">
            <!-- Tab Headers -->
            <div class="border-b">
                <div class="flex space-x-8 px-6">
                    <button onclick="switchTab('description')" id="tab-description" class="tab-btn py-4 border-b-2 border-indigo-600 text-indigo-600 font-medium">
                        Description
                    </button>
                    <button onclick="switchTab('specifications')" id="tab-specifications" class="tab-btn py-4 border-b-2 border-transparent text-gray-600 hover:text-gray-900">
                        Specifications
                    </button>
                    <button onclick="switchTab('reviews')" id="tab-reviews" class="tab-btn py-4 border-b-2 border-transparent text-gray-600 hover:text-gray-900">
                        Reviews (128)
                    </button>
                    <button onclick="switchTab('shipping')" id="tab-shipping" class="tab-btn py-4 border-b-2 border-transparent text-gray-600 hover:text-gray-900">
                        Shipping & Returns
                    </button>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="p-6">
                <!-- Description Tab -->
                <div id="content-description" class="tab-content">
                    <h3 class="text-xl font-semibold mb-4">Product Description</h3>
                    <p class="text-gray-600 mb-4">
                        The Classic White Sneakers are the perfect blend of style, comfort, and durability. Designed for the modern individual 
                        who values both fashion and functionality, these sneakers feature a timeless white colorway that pairs effortlessly with 
                        any outfit.
                    </p>
                    <p class="text-gray-600 mb-4">
                        Crafted from premium leather with reinforced stitching, these sneakers are built to last. The cushioned insole provides 
                        all-day comfort, while the rubber outsole ensures excellent traction on various surfaces.
                    </p>
                    <h4 class="font-semibold text-gray-900 mb-2">Key Features:</h4>
                    <ul class="list-disc list-inside space-y-2 text-gray-600 mb-4">
                        <li>Premium leather upper for durability and style</li>
                        <li>Cushioned insole for maximum comfort</li>
                        <li>Breathable lining to keep feet fresh</li>
                        <li>Rubber outsole for excellent grip</li>
                        <li>Classic lace-up design</li>
                        <li>Suitable for all-day wear</li>
                    </ul>
                </div>

                <!-- Specifications Tab -->
                <div id="content-specifications" class="tab-content hidden">
                    <h3 class="text-xl font-semibold mb-4">Product Specifications</h3>
                    <table class="w-full">
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="py-3 font-medium text-gray-900">Brand</td>
                                <td class="py-3 text-gray-600">ModernShop</td>
                            </tr>
                            <tr>
                                <td class="py-3 font-medium text-gray-900">Material</td>
                                <td class="py-3 text-gray-600">Premium Leather</td>
                            </tr>
                            <tr>
                                <td class="py-3 font-medium text-gray-900">Sole Material</td>
                                <td class="py-3 text-gray-600">Rubber</td>
                            </tr>
                            <tr>
                                <td class="py-3 font-medium text-gray-900">Closure Type</td>
                                <td class="py-3 text-gray-600">Lace-up</td>
                            </tr>
                            <tr>
                                <td class="py-3 font-medium text-gray-900">Available Sizes</td>
                                <td class="py-3 text-gray-600">38-47 (EU)</td>
                            </tr>
                            <tr>
                                <td class="py-3 font-medium text-gray-900">Colors</td>
                                <td class="py-3 text-gray-600">White, Black, Blue, Red</td>
                            </tr>
                            <tr>
                                <td class="py-3 font-medium text-gray-900">Weight</td>
                                <td class="py-3 text-gray-600">450g (per shoe)</td>
                            </tr>
                            <tr>
                                <td class="py-3 font-medium text-gray-900">Care Instructions</td>
                                <td class="py-3 text-gray-600">Wipe with damp cloth, Air dry</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Reviews Tab -->
                <div id="content-reviews" class="tab-content hidden">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Customer Reviews</h3>
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <span class="text-3xl font-bold mr-2">4.5</span>
                                    <div>
                                        <div class="flex text-yellow-400">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <p class="text-sm text-gray-600">Based on 128 reviews</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                            Write a Review
                        </button>
                    </div>

                    <!-- Review Item -->
                    <div class="border-t pt-6 mb-6">
                        <div class="flex items-start justify-between mb-3">
                            <div>
                                <div class="flex items-center space-x-2 mb-1">
                                    <h4 class="font-semibold text-gray-900">John Doe</h4>
                                    <span class="text-green-600 text-sm"><i class="fas fa-check-circle"></i> Verified Purchase</span>
                                </div>
                                <div class="flex text-yellow-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <span class="text-sm text-gray-500">2 days ago</span>
                        </div>
                        <h5 class="font-medium text-gray-900 mb-2">Amazing quality and comfort!</h5>
                        <p class="text-gray-600 mb-3">
                            These sneakers exceeded my expectations. The quality is outstanding and they're incredibly comfortable. 
                            I've been wearing them daily for a week and my feet feel great. Highly recommend!
                        </p>
                        <div class="flex items-center space-x-4 text-sm">
                            <button class="text-gray-600 hover:text-gray-900">
                                <i class="far fa-thumbs-up mr-1"></i> Helpful (24)
                            </button>
                            <button class="text-gray-600 hover:text-gray-900">
                                <i class="far fa-comment mr-1"></i> Reply
                            </button>
                        </div>
                    </div>

                    <!-- Review Item -->
                    <div class="border-t pt-6 mb-6">
                        <div class="flex items-start justify-between mb-3">
                            <div>
                                <div class="flex items-center space-x-2 mb-1">
                                    <h4 class="font-semibold text-gray-900">Jane Smith</h4>
                                    <span class="text-green-600 text-sm"><i class="fas fa-check-circle"></i> Verified Purchase</span>
                                </div>
                                <div class="flex text-yellow-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <span class="text-sm text-gray-500">1 week ago</span>
                        </div>
                        <h5 class="font-medium text-gray-900 mb-2">Great sneakers, perfect fit</h5>
                        <p class="text-gray-600 mb-3">
                            Love the design and the fit is perfect. True to size. Only minor issue is they need some breaking in, 
                            but that's expected with leather shoes. Overall very satisfied!
                        </p>
                        <div class="flex items-center space-x-4 text-sm">
                            <button class="text-gray-600 hover:text-gray-900">
                                <i class="far fa-thumbs-up mr-1"></i> Helpful (15)
                            </button>
                            <button class="text-gray-600 hover:text-gray-900">
                                <i class="far fa-comment mr-1"></i> Reply
                            </button>
                        </div>
                    </div>

                    <button class="w-full border-2 border-gray-300 text-gray-700 py-3 rounded-lg font-medium hover:border-gray-400 transition">
                        Load More Reviews
                    </button>
                </div>

                <!-- Shipping Tab -->
                <div id="content-shipping" class="tab-content hidden">
                    <h3 class="text-xl font-semibold mb-4">Shipping Information</h3>
                    <div class="space-y-4 mb-6">
                        <div>
                            <h4 class="font-medium text-gray-900 mb-2">Standard Shipping</h4>
                            <p class="text-gray-600">Delivery in 5-7 business days - $10.00</p>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900 mb-2">Express Shipping</h4>
                            <p class="text-gray-600">Delivery in 2-3 business days - $20.00</p>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900 mb-2">Free Shipping</h4>
                            <p class="text-gray-600">On orders over $50</p>
                        </div>
                    </div>

                    <h3 class="text-xl font-semibold mb-4 mt-8">Return Policy</h3>
                    <p class="text-gray-600 mb-4">
                        We offer a 30-day return policy for all unworn items in their original packaging. 
                        Returns are free and easy - just contact our customer service team to initiate a return.
                    </p>
                    <ul class="list-disc list-inside space-y-2 text-gray-600">
                        <li>Items must be unworn and in original condition</li>
                        <li>Original packaging must be included</li>
                        <li>Refunds processed within 5-7 business days</li>
                        <li>Free return shipping on all orders</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div>
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Related Products</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product 1 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition group">
                    <div class="relative h-64 bg-gray-200 flex items-center justify-center overflow-hidden">
                        <i class="fas fa-image text-gray-400 text-6xl"></i>
                        <div class="absolute top-4 right-4">
                            <button class="bg-white w-10 h-10 rounded-full shadow-md flex items-center justify-center hover:bg-indigo-600 hover:text-white transition">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold mb-2 group-hover:text-indigo-600 transition">Black Running Shoes</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(89)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-indigo-600">$89.99</span>
                            <button class="bg-indigo-600 text-white w-10 h-10 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition group">
                    <div class="relative h-64 bg-gray-200 flex items-center justify-center overflow-hidden">
                        <i class="fas fa-image text-gray-400 text-6xl"></i>
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
                        <h3 class="font-semibold mb-2 group-hover:text-indigo-600 transition">Canvas Slip-Ons</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(45)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-indigo-600">$59.99</span>
                            <button class="bg-indigo-600 text-white w-10 h-10 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition group">
                    <div class="relative h-64 bg-gray-200 flex items-center justify-center overflow-hidden">
                        <i class="fas fa-image text-gray-400 text-6xl"></i>
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
                        <h3 class="font-semibold mb-2 group-hover:text-indigo-600 transition">High-Top Sneakers</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(67)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-gray-400 line-through text-sm">$99.99</span>
                                <span class="text-xl font-bold text-indigo-600 ml-2">$84.99</span>
                            </div>
                            <button class="bg-indigo-600 text-white w-10 h-10 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition group">
                    <div class="relative h-64 bg-gray-200 flex items-center justify-center overflow-hidden">
                        <i class="fas fa-image text-gray-400 text-6xl"></i>
                        <div class="absolute top-4 right-4">
                            <button class="bg-white w-10 h-10 rounded-full shadow-md flex items-center justify-center hover:bg-indigo-600 hover:text-white transition">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold mb-2 group-hover:text-indigo-600 transition">Leather Boots</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(123)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-indigo-600">$149.99</span>
                            <button class="bg-indigo-600 text-white w-10 h-10 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
   <x-front.footer/>

    <!-- Success Modal -->
    <div id="successModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6">
                <div class="text-center">
                    <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
                        <i class="fas fa-check text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Added to Cart!</h3>
                    <p class="text-gray-600 mb-6">Product has been added to your shopping cart.</p>
                    
                    <div class="flex space-x-3">
                        <button onclick="closeSuccessModal()" class="flex-1 border-2 border-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-50 transition">
                            Close
                        </button>
                        <a href="{{ route('user.cart') }}" class="flex-1 bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                            View Cart
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Change main image when clicking thumbnail
        function changeImage(index) {
            // Remove active class from all thumbnails
            document.querySelectorAll('.thumbnail-active').forEach(el => {
                el.classList.remove('thumbnail-active', 'border-indigo-600');
                el.classList.add('border-transparent');
            });
            
            // Add active class to clicked thumbnail
            event.target.closest('div').classList.add('thumbnail-active', 'border-indigo-600');
            event.target.closest('div').classList.remove('border-transparent');
            
            // Update main image (in real app, this would change the image source)
            console.log('Changed to image:', index);
        }

        // Quantity controls
        function increaseQty() {
            const qtyInput = document.getElementById('quantity');
            const max = parseInt(qtyInput.max);
            const current = parseInt(qtyInput.value);
            if (current < max) {
                qtyInput.value = current + 1;
            }
        }

        function decreaseQty() {
            const qtyInput = document.getElementById('quantity');
            const min = parseInt(qtyInput.min);
            const current = parseInt(qtyInput.value);
            if (current > min) {
                qtyInput.value = current - 1;
            }
        }

        // Add to cart
        function addToCart() {
            // In real app, this would send data to backend
            document.getElementById('successModal').classList.remove('hidden');
        }

        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
        }

        // Toggle wishlist
        function toggleWishlist() {
            const btn = document.getElementById('wishlistBtn');
            const icon = btn.querySelector('i');
            
            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                btn.classList.add('border-red-500', 'text-red-500');
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
                btn.classList.remove('border-red-500', 'text-red-500');
            }
        }

        // Tab switching
        function switchTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Remove active class from all tab buttons
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('border-indigo-600', 'text-indigo-600');
                btn.classList.add('border-transparent', 'text-gray-600');
            });
            
            // Show selected tab content
            document.getElementById(`content-${tabName}`).classList.remove('hidden');
            
            // Add active class to selected tab button
            const activeBtn = document.getElementById(`tab-${tabName}`);
            activeBtn.classList.remove('border-transparent', 'text-gray-600');
            activeBtn.classList.add('border-indigo-600', 'text-indigo-600');
        }
    </script>
</body>
</html>