<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - ModernShop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <a href="ecommerce-home.html">
                        <h1 class="text-2xl font-bold text-indigo-600">ModernShop</h1>
                    </a>
                </div>
                
                <!-- Nav Links -->
                <div class="flex items-center space-x-6">
                    <a href="ecommerce-home.html" class="text-gray-700 hover:text-indigo-600">Home</a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600">Shop</a>
                    <a href="#" class="relative text-indigo-600 font-medium">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-indigo-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                    </a>
                    <a href="login.blade.php" class="text-gray-700 hover:text-indigo-600">
                        <i class="fas fa-user text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center space-x-2 text-sm">
                <a href="ecommerce-home.html" class="text-gray-500 hover:text-indigo-600">Home</a>
                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                <span class="text-gray-900 font-medium">Shopping Cart</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Shopping Cart</h1>
            <p class="text-gray-600 mt-2">You have 3 items in your cart</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <!-- Cart Item 1 -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-4">
                    <div class="flex items-start">
                        <!-- Product Image -->
                        <div class="w-24 h-24 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-image text-gray-400 text-2xl"></i>
                        </div>
                        
                        <!-- Product Details -->
                        <div class="ml-6 flex-1">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Classic White Sneakers</h3>
                                    <p class="text-sm text-gray-500 mt-1">Size: 42 | Color: White</p>
                                    <p class="text-sm text-gray-500">SKU: SNK-001</p>
                                </div>
                                <button onclick="removeItem(1)" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            
                            <!-- Quantity & Price -->
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-center border border-gray-300 rounded-lg">
                                    <button onclick="decreaseQty(1)" class="px-3 py-2 hover:bg-gray-100 rounded-l-lg">
                                        <i class="fas fa-minus text-sm"></i>
                                    </button>
                                    <input type="number" id="qty-1" value="1" min="1" class="w-16 text-center border-x border-gray-300 py-2 focus:outline-none" readonly>
                                    <button onclick="increaseQty(1)" class="px-3 py-2 hover:bg-gray-100 rounded-r-lg">
                                        <i class="fas fa-plus text-sm"></i>
                                    </button>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-500 line-through">$99.99</p>
                                    <p class="text-xl font-bold text-indigo-600" id="price-1">$79.99</p>
                                </div>
                            </div>
                            
                            <!-- Stock Status -->
                            <div class="mt-3">
                                <span class="inline-flex items-center text-sm text-green-600">
                                    <i class="fas fa-check-circle mr-1"></i> In Stock
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cart Item 2 -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-4">
                    <div class="flex items-start">
                        <!-- Product Image -->
                        <div class="w-24 h-24 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-image text-gray-400 text-2xl"></i>
                        </div>
                        
                        <!-- Product Details -->
                        <div class="ml-6 flex-1">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Leather Backpack</h3>
                                    <p class="text-sm text-gray-500 mt-1">Color: Brown</p>
                                    <p class="text-sm text-gray-500">SKU: BAG-002</p>
                                </div>
                                <button onclick="removeItem(2)" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            
                            <!-- Quantity & Price -->
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-center border border-gray-300 rounded-lg">
                                    <button onclick="decreaseQty(2)" class="px-3 py-2 hover:bg-gray-100 rounded-l-lg">
                                        <i class="fas fa-minus text-sm"></i>
                                    </button>
                                    <input type="number" id="qty-2" value="1" min="1" class="w-16 text-center border-x border-gray-300 py-2 focus:outline-none" readonly>
                                    <button onclick="increaseQty(2)" class="px-3 py-2 hover:bg-gray-100 rounded-r-lg">
                                        <i class="fas fa-plus text-sm"></i>
                                    </button>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold text-indigo-600" id="price-2">$149.99</p>
                                </div>
                            </div>
                            
                            <!-- Stock Status -->
                            <div class="mt-3">
                                <span class="inline-flex items-center text-sm text-green-600">
                                    <i class="fas fa-check-circle mr-1"></i> In Stock
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cart Item 3 -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-4">
                    <div class="flex items-start">
                        <!-- Product Image -->
                        <div class="w-24 h-24 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-image text-gray-400 text-2xl"></i>
                        </div>
                        
                        <!-- Product Details -->
                        <div class="ml-6 flex-1">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Wireless Headphones</h3>
                                    <p class="text-sm text-gray-500 mt-1">Color: Black</p>
                                    <p class="text-sm text-gray-500">SKU: AUD-003</p>
                                </div>
                                <button onclick="removeItem(3)" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            
                            <!-- Quantity & Price -->
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-center border border-gray-300 rounded-lg">
                                    <button onclick="decreaseQty(3)" class="px-3 py-2 hover:bg-gray-100 rounded-l-lg">
                                        <i class="fas fa-minus text-sm"></i>
                                    </button>
                                    <input type="number" id="qty-3" value="1" min="1" class="w-16 text-center border-x border-gray-300 py-2 focus:outline-none" readonly>
                                    <button onclick="increaseQty(3)" class="px-3 py-2 hover:bg-gray-100 rounded-r-lg">
                                        <i class="fas fa-plus text-sm"></i>
                                    </button>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold text-indigo-600" id="price-3">$199.99</p>
                                </div>
                            </div>
                            
                            <!-- Stock Status -->
                            <div class="mt-3">
                                <span class="inline-flex items-center text-sm text-yellow-600">
                                    <i class="fas fa-exclamation-circle mr-1"></i> Only 2 left in stock
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Continue Shopping -->
                <div class="mt-6">
                    <a href="ecommerce-home.html" class="inline-flex items-center text-indigo-600 hover:text-indigo-700 font-medium">
                        <i class="fas fa-arrow-left mr-2"></i> Continue Shopping
                    </a>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm p-6 sticky top-24">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Order Summary</h2>
                    
                    <!-- Promo Code -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Promo Code</label>
                        <div class="flex gap-2">
                            <input type="text" id="promoCode" placeholder="Enter code" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <button onclick="applyPromo()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                                Apply
                            </button>
                        </div>
                        <div id="promoMessage" class="mt-2 text-sm"></div>
                    </div>
                    
                    <!-- Price Breakdown -->
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span id="subtotal">$429.97</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Shipping</span>
                            <span id="shipping">$10.00</span>
                        </div>
                        <div class="flex justify-between text-gray-600" id="discountRow" style="display: none;">
                            <span>Discount</span>
                            <span class="text-green-600" id="discount">-$0.00</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Tax (10%)</span>
                            <span id="tax">$43.00</span>
                        </div>
                        <div class="border-t pt-3 flex justify-between text-lg font-bold">
                            <span>Total</span>
                            <span class="text-indigo-600" id="total">$482.97</span>
                        </div>
                    </div>
                    
                    <!-- Checkout Button -->
                    <button onclick="proceedToCheckout()" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition mb-3">
                        Proceed to Checkout
                    </button>
                    
                    <!-- PayPal Button (Optional) -->
                    <button class="w-full bg-yellow-400 text-gray-900 py-3 rounded-lg font-semibold hover:bg-yellow-500 transition mb-4">
                        <i class="fab fa-paypal mr-2"></i> PayPal
                    </button>
                    
                    <!-- Security Badges -->
                    <div class="border-t pt-4 text-center text-sm text-gray-500">
                        <div class="flex items-center justify-center gap-2 mb-2">
                            <i class="fas fa-lock text-green-600"></i>
                            <span>Secure Checkout</span>
                        </div>
                        <p>SSL Encrypted Payment</p>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mt-6">
                    <div class="flex items-start">
                        <i class="fas fa-info-circle text-blue-600 mt-1 mr-3"></i>
                        <div class="text-sm text-blue-800">
                            <p class="font-semibold mb-1">Free Shipping</p>
                            <p>Add $20.03 more to get free shipping!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recommended Products -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">You May Also Like</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product 1 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-image text-gray-400 text-4xl"></i>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Minimalist Watch</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-indigo-600">$254.99</span>
                            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-image text-gray-400 text-4xl"></i>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Cotton T-Shirt</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-indigo-600">$29.99</span>
                            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-image text-gray-400 text-4xl"></i>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Sunglasses</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-indigo-600">$89.99</span>
                            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-image text-gray-400 text-4xl"></i>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Wallet</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-indigo-600">$49.99</span>
                            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2026 ModernShop. All rights reserved.</p>
        </div>
    </footer>

    <!-- Remove Item Confirmation Modal -->
    <div id="removeModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6">
                <div class="text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                        <i class="fas fa-trash text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Remove Item</h3>
                    <p class="text-sm text-gray-500 mb-6">Are you sure you want to remove this item from your cart?</p>
                    
                    <div class="flex justify-center space-x-4">
                        <button onclick="closeRemoveModal()" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            Cancel
                        </button>
                        <button onclick="confirmRemove()" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                            Remove
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Item prices (in a real app, this would come from backend)
        const itemPrices = {
            1: 79.99,
            2: 149.99,
            3: 199.99
        };

        let itemToRemove = null;
        let discountPercent = 0;

        // Increase quantity
        function increaseQty(id) {
            const qtyInput = document.getElementById(`qty-${id}`);
            qtyInput.value = parseInt(qtyInput.value) + 1;
            updateCart();
        }

        // Decrease quantity
        function decreaseQty(id) {
            const qtyInput = document.getElementById(`qty-${id}`);
            if (parseInt(qtyInput.value) > 1) {
                qtyInput.value = parseInt(qtyInput.value) - 1;
                updateCart();
            }
        }

        // Remove item
        function removeItem(id) {
            itemToRemove = id;
            document.getElementById('removeModal').classList.remove('hidden');
        }

        function closeRemoveModal() {
            document.getElementById('removeModal').classList.add('hidden');
            itemToRemove = null;
        }

        function confirmRemove() {
            if (itemToRemove) {
                // In real app, this would update backend
                const itemElement = document.getElementById(`qty-${itemToRemove}`).closest('.bg-white');
                itemElement.style.opacity = '0';
                setTimeout(() => {
                    itemElement.remove();
                    delete itemPrices[itemToRemove];
                    updateCart();
                    closeRemoveModal();
                }, 300);
            }
        }

        // Apply promo code
        function applyPromo() {
            const promoCode = document.getElementById('promoCode').value.trim().toUpperCase();
            const promoMessage = document.getElementById('promoMessage');
            
            // Sample promo codes
            const validCodes = {
                'SAVE10': 10,
                'SAVE20': 20,
                'WELCOME': 15
            };
            
            if (validCodes[promoCode]) {
                discountPercent = validCodes[promoCode];
                promoMessage.innerHTML = `<span class="text-green-600"><i class="fas fa-check-circle"></i> Promo code applied! ${discountPercent}% off</span>`;
                updateCart();
            } else if (promoCode) {
                promoMessage.innerHTML = '<span class="text-red-600"><i class="fas fa-times-circle"></i> Invalid promo code</span>';
                discountPercent = 0;
                updateCart();
            }
        }

        // Update cart totals
        function updateCart() {
            let subtotal = 0;
            
            // Calculate subtotal
            Object.keys(itemPrices).forEach(id => {
                const qtyInput = document.getElementById(`qty-${id}`);
                if (qtyInput) {
                    const qty = parseInt(qtyInput.value);
                    const price = itemPrices[id];
                    const itemTotal = price * qty;
                    
                    // Update item price display
                    document.getElementById(`price-${id}`).textContent = `$${itemTotal.toFixed(2)}`;
                    subtotal += itemTotal;
                }
            });
            
            // Calculate shipping (free over $50)
            const shipping = subtotal >= 50 ? 0 : 10;
            
            // Calculate discount
            const discount = (subtotal * discountPercent) / 100;
            
            // Calculate tax
            const tax = ((subtotal - discount + shipping) * 0.1);
            
            // Calculate total
            const total = subtotal - discount + shipping + tax;
            
            // Update display
            document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('shipping').textContent = shipping === 0 ? 'FREE' : `$${shipping.toFixed(2)}`;
            document.getElementById('tax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('total').textContent = `$${total.toFixed(2)}`;
            
            // Show/hide discount row
            const discountRow = document.getElementById('discountRow');
            if (discount > 0) {
                discountRow.style.display = 'flex';
                document.getElementById('discount').textContent = `-$${discount.toFixed(2)}`;
            } else {
                discountRow.style.display = 'none';
            }
        }

        // Proceed to checkout
        function proceedToCheckout() {
            // In real app, this would navigate to checkout page
            alert('Proceeding to checkout...');
            // window.location.href = 'checkout.html';
        }

        // Initialize cart
        document.addEventListener('DOMContentLoaded', function() {
            updateCart();
        });
    </script>
</body>
</html>
