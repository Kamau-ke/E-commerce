<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ModernShop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Top Navigation Bar -->
    <nav class="bg-white shadow-sm fixed top-0 left-0 right-0 z-50">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo & Menu Toggle -->
                <div class="flex items-center">
                    <button id="menuToggle" class="lg:hidden text-gray-600 hover:text-gray-900 mr-4">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-2xl font-bold text-indigo-600">ModernShop Admin</h1>
                </div>
                
                <!-- Right Side Icons -->
                <div class="flex items-center space-x-4">
                    <button class="relative text-gray-600 hover:text-gray-900">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                    </button>
                    <div class="relative">
                        <button id="profileToggle" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                            <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center text-white">
                                <i class="fas fa-user"></i>
                            </div>
                            <span class="hidden md:block font-medium">Admin</span>
                            <i class="fas fa-chevron-down text-sm"></i>
                        </button>
                        <!-- Dropdown Menu -->
                        <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user-circle mr-2"></i> Profile
                            </a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-cog mr-2"></i> Settings
                            </a>
                            <hr class="my-2">
                            <a href="#" class="block px-4 py-2 text-red-600 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed left-0 top-16 h-full w-64 bg-white shadow-lg transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-40">
        <div class="p-4 h-full overflow-y-auto">
            <nav class="space-y-1">
                <!-- Dashboard -->
                <a href="#dashboard" onclick="showSection('dashboard')" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition">
                    <i class="fas fa-home mr-3 text-lg"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                
                <!-- Products -->
                <a href="#products" onclick="showSection('products')" class="nav-link active flex items-center px-4 py-3 bg-indigo-50 text-indigo-600 rounded-lg transition">
                    <i class="fas fa-box mr-3 text-lg"></i>
                    <span class="font-medium">Products</span>
                </a>
                
                <!-- Categories -->
                <a href="#categories" onclick="showSection('categories')" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition">
                    <i class="fas fa-tags mr-3 text-lg"></i>
                    <span class="font-medium">Categories</span>
                </a>
                
                <!-- Orders -->
                <a href="#orders" onclick="showSection('orders')" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition">
                    <i class="fas fa-shopping-cart mr-3 text-lg"></i>
                    <span class="font-medium">Orders</span>
                </a>
                
                <!-- Customers -->
                <a href="#customers" onclick="showSection('customers')" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition">
                    <i class="fas fa-users mr-3 text-lg"></i>
                    <span class="font-medium">Customers</span>
                </a>
                
                <!-- Analytics -->
                <a href="#analytics" onclick="showSection('analytics')" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition">
                    <i class="fas fa-chart-line mr-3 text-lg"></i>
                    <span class="font-medium">Analytics</span>
                </a>
                
                <!-- Reviews -->
                <a href="#reviews" onclick="showSection('reviews')" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition">
                    <i class="fas fa-star mr-3 text-lg"></i>
                    <span class="font-medium">Reviews</span>
                </a>
                
                <!-- Settings -->
                <a href="#settings" onclick="showSection('settings')" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition">
                    <i class="fas fa-cog mr-3 text-lg"></i>
                    <span class="font-medium">Settings</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- Overlay for mobile -->
    <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden" onclick="toggleSidebar()"></div>

    <!-- Main Content -->
    <main class="lg:ml-64 pt-16 min-h-screen">
        <div class="p-6">
            <!-- Dashboard Section -->
            <div id="dashboard-section" class="content-section hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Dashboard Overview</h2>
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Revenue</p>
                                <h3 class="text-2xl font-bold text-gray-800 mt-1">$54,239</h3>
                                <p class="text-green-600 text-sm mt-2">
                                    <i class="fas fa-arrow-up"></i> 12.5% from last month
                                </p>
                            </div>
                            <div class="bg-indigo-100 w-12 h-12 rounded-full flex items-center justify-center">
                                <i class="fas fa-dollar-sign text-indigo-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Orders</p>
                                <h3 class="text-2xl font-bold text-gray-800 mt-1">1,429</h3>
                                <p class="text-green-600 text-sm mt-2">
                                    <i class="fas fa-arrow-up"></i> 8.2% from last month
                                </p>
                            </div>
                            <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center">
                                <i class="fas fa-shopping-bag text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Products</p>
                                <h3 class="text-2xl font-bold text-gray-800 mt-1">342</h3>
                                <p class="text-blue-600 text-sm mt-2">
                                    <i class="fas fa-arrow-up"></i> 23 new this month
                                </p>
                            </div>
                            <div class="bg-blue-100 w-12 h-12 rounded-full flex items-center justify-center">
                                <i class="fas fa-box text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Customers</p>
                                <h3 class="text-2xl font-bold text-gray-800 mt-1">8,462</h3>
                                <p class="text-green-600 text-sm mt-2">
                                    <i class="fas fa-arrow-up"></i> 15.3% from last month
                                </p>
                            </div>
                            <div class="bg-purple-100 w-12 h-12 rounded-full flex items-center justify-center">
                                <i class="fas fa-users text-purple-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders & Quick Actions -->
                <div class="grid lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2 bg-white rounded-lg shadow">
                        <div class="p-6 border-b">
                            <h3 class="text-lg font-semibold">Recent Orders</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 text-sm">#ORD-001</td>
                                        <td class="px-6 py-4 text-sm">John Doe</td>
                                        <td class="px-6 py-4 text-sm font-medium">$159.99</td>
                                        <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm">#ORD-002</td>
                                        <td class="px-6 py-4 text-sm">Jane Smith</td>
                                        <td class="px-6 py-4 text-sm font-medium">$89.99</td>
                                        <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Processing</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
                        <div class="space-y-3">
                            <button onclick="showSection('products'); showAddProductModal()" class="w-full bg-indigo-600 text-white px-4 py-3 rounded-lg hover:bg-indigo-700 transition">
                                <i class="fas fa-plus mr-2"></i> Add Product
                            </button>
                            <button onclick="showSection('orders')" class="w-full bg-gray-100 text-gray-700 px-4 py-3 rounded-lg hover:bg-gray-200 transition">
                                <i class="fas fa-shopping-cart mr-2"></i> View Orders
                            </button>
                            <button onclick="showSection('customers')" class="w-full bg-gray-100 text-gray-700 px-4 py-3 rounded-lg hover:bg-gray-200 transition">
                                <i class="fas fa-users mr-2"></i> View Customers
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Section -->
            <div id="products-section" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Products Management</h2>
                    <button onclick="showAddProductModal()" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                        <i class="fas fa-plus mr-2"></i> Add Product
                    </button>
                </div>

                <!-- Filters & Search -->
                <div class="bg-white rounded-lg shadow p-4 mb-6">
                    <div class="grid md:grid-cols-4 gap-4">
                        <input type="text" placeholder="Search products..." class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>All Categories</option>
                            <option>Electronics</option>
                            <option>Clothing</option>
                            <option>Accessories</option>
                        </select>
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>All Status</option>
                            <option>Active</option>
                            <option>Inactive</option>
                            <option>Out of Stock</option>
                        </select>
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition">
                            <i class="fas fa-filter mr-2"></i> Apply Filters
                        </button>
                    </div>
                </div>

                <!-- Products Table -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stock</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 bg-gray-200 rounded flex items-center justify-center">
                                                <i class="fas fa-image text-gray-400"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Classic White Sneakers</div>
                                                <div class="text-sm text-gray-500">SKU: SNK-001</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm">Footwear</td>
                                    <td class="px-6 py-4 text-sm font-medium">$79.99</td>
                                    <td class="px-6 py-4 text-sm">45</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <button onclick="viewProduct(1)" class="text-blue-600 hover:text-blue-900 mr-3">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button onclick="editProduct(1)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button onclick="deleteProduct(1)" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 bg-gray-200 rounded flex items-center justify-center">
                                                <i class="fas fa-image text-gray-400"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Leather Backpack</div>
                                                <div class="text-sm text-gray-500">SKU: BAG-002</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm">Accessories</td>
                                    <td class="px-6 py-4 text-sm font-medium">$149.99</td>
                                    <td class="px-6 py-4 text-sm">23</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <button onclick="viewProduct(2)" class="text-blue-600 hover:text-blue-900 mr-3">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button onclick="editProduct(2)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button onclick="deleteProduct(2)" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 bg-gray-200 rounded flex items-center justify-center">
                                                <i class="fas fa-image text-gray-400"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Wireless Headphones</div>
                                                <div class="text-sm text-gray-500">SKU: AUD-003</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm">Electronics</td>
                                    <td class="px-6 py-4 text-sm font-medium">$199.99</td>
                                    <td class="px-6 py-4 text-sm text-red-600 font-medium">0</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Out of Stock</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <button onclick="viewProduct(3)" class="text-blue-600 hover:text-blue-900 mr-3">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button onclick="editProduct(3)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button onclick="deleteProduct(3)" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="bg-white px-6 py-4 border-t flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">342</span> results
                        </div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">Previous</button>
                            <button class="px-3 py-2 bg-indigo-600 text-white rounded-lg text-sm">1</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">2</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">3</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other sections placeholders -->
            <div id="categories-section" class="content-section hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Categories Management</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-gray-600">Categories management interface coming soon...</p>
                </div>
            </div>

            <div id="orders-section" class="content-section hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Orders Management</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-gray-600">Orders management interface coming soon...</p>
                </div>
            </div>

            <div id="customers-section" class="content-section hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Customers Management</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-gray-600">Customers management interface coming soon...</p>
                </div>
            </div>

            <div id="analytics-section" class="content-section hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Analytics & Reports</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-gray-600">Analytics interface coming soon...</p>
                </div>
            </div>

            <div id="reviews-section" class="content-section hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Reviews Management</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-gray-600">Reviews management interface coming soon...</p>
                </div>
            </div>

            <div id="settings-section" class="content-section hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Settings</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-gray-600">Settings interface coming soon...</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Add/Edit Product Modal -->
    <div id="productModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
                <div class="p-6 border-b flex justify-between items-center sticky top-0 bg-white">
                    <h3 class="text-2xl font-bold text-gray-800" id="modalTitle">Add New Product</h3>
                    <button onclick="closeProductModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
                
                <form id="productForm" class="p-6" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="productId" name="product_id">
                    <input type="hidden" id="formMethod" name="_method" value="POST">
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Product Name -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                            <input type="text" name="name" id="productName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter product name">
                        </div>

                        <!-- SKU -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">SKU *</label>
                            <input type="text" name="sku" id="productSKU" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="e.g., PRD-001">
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                            <select name="category_id" id="productCategory" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="">Select Category</option>
                                <option value="1">Electronics</option>
                                <option value="2">Clothing</option>
                                <option value="3">Footwear</option>
                                <option value="4">Accessories</option>
                            </select>
                        </div>

                        <!-- Price -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Price ($) *</label>
                            <input type="number" name="price" id="productPrice" required step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="0.00">
                        </div>

                        <!-- Sale Price -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sale Price ($)</label>
                            <input type="number" name="sale_price" id="productSalePrice" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="0.00">
                        </div>

                        <!-- Stock Quantity -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity *</label>
                            <input type="number" name="stock" id="productStock" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="0">
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                            <select name="status" id="productStatus" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                            <textarea name="description" id="productDescription" required rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter product description"></textarea>
                        </div>

                        <!-- Product Images -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product Images</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-indigo-500 transition">
                                <input type="file" name="images[]" id="productImages" multiple accept="image/*" class="hidden" onchange="previewImages(event)">
                                <label for="productImages" class="cursor-pointer">
                                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                                    <p class="text-gray-600">Click to upload or drag and drop</p>
                                    <p class="text-sm text-gray-400 mt-1">PNG, JPG, GIF up to 10MB</p>
                                </label>
                            </div>
                            <div id="imagePreview" class="grid grid-cols-4 gap-4 mt-4"></div>
                        </div>

                        <!-- Additional Fields -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Brand</label>
                            <input type="text" name="brand" id="productBrand" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Brand name">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Weight (kg)</label>
                            <input type="number" name="weight" id="productWeight" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="0.00">
                        </div>

                        <!-- Tags -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tags (comma separated)</label>
                            <input type="text" name="tags" id="productTags" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="e.g., trending, sale, new arrival">
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-4 mt-6 pt-6 border-t">
                        <button type="button" onclick="closeProductModal()" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            Cancel
                        </button>
                        <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-save mr-2"></i> Save Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Product Modal -->
    <div id="viewProductModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-3xl w-full">
                <div class="p-6 border-b flex justify-between items-center">
                    <h3 class="text-2xl font-bold text-gray-800">Product Details</h3>
                    <button onclick="closeViewProductModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
                
                <div class="p-6" id="productDetailsContent">
                    <!-- Product details will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6">
                <div class="text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                        <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Delete Product</h3>
                    <p class="text-sm text-gray-500 mb-6">Are you sure you want to delete this product? This action cannot be undone.</p>
                    
                    <div class="flex justify-center space-x-4">
                        <button onclick="closeDeleteModal()" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            Cancel
                        </button>
                        <button onclick="confirmDelete()" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Navigation
        function showSection(sectionName) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
            });
            
            // Show selected section
            document.getElementById(sectionName + '-section').classList.remove('hidden');
            
            // Update active nav link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active', 'bg-indigo-50', 'text-indigo-600');
                link.classList.add('text-gray-700');
            });
            
            event.target.closest('.nav-link').classList.add('active', 'bg-indigo-50', 'text-indigo-600');
            event.target.closest('.nav-link').classList.remove('text-gray-700');
            
            // Close sidebar on mobile
            if (window.innerWidth < 1024) {
                toggleSidebar();
            }
        }

        // Sidebar Toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        document.getElementById('menuToggle').addEventListener('click', toggleSidebar);

        // Profile Dropdown
        document.getElementById('profileToggle').addEventListener('click', function(e) {
            e.stopPropagation();
            document.getElementById('profileDropdown').classList.toggle('hidden');
        });

        document.addEventListener('click', function() {
            document.getElementById('profileDropdown').classList.add('hidden');
        });

        // Product Modal Functions
        function showAddProductModal() {
            document.getElementById('modalTitle').textContent = 'Add New Product';
            document.getElementById('productForm').reset();
            document.getElementById('productId').value = '';
            document.getElementById('formMethod').value = 'POST';
            
            document.getElementById('imagePreview').innerHTML = '';
            document.getElementById('productModal').classList.remove('hidden');
        }

        function editProduct(id) {
            // In real implementation, fetch product data via AJAX
            document.getElementById('modalTitle').textContent = 'Edit Product';
            document.getElementById('productId').value = id;
            document.getElementById('formMethod').value = 'PUT';
          
            
            // Load product data (sample)
            document.getElementById('productName').value = 'Classic White Sneakers';
            document.getElementById('productSKU').value = 'SNK-001';
            document.getElementById('productCategory').value = '3';
            document.getElementById('productPrice').value = '79.99';
            document.getElementById('productStock').value = '45';
            document.getElementById('productStatus').value = 'active';
            document.getElementById('productDescription').value = 'Comfortable and stylish white sneakers';
            
            document.getElementById('productModal').classList.remove('hidden');
        }

        function closeProductModal() {
            document.getElementById('productModal').classList.add('hidden');
        }

        // View Product
        function viewProduct(id) {
            // In real implementation, fetch product data via AJAX
            const content = `
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center mb-4">
                            <i class="fas fa-image text-gray-400 text-6xl"></i>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold mb-4">Classic White Sneakers</h4>
                        <div class="space-y-3">
                            <div><span class="font-medium">SKU:</span> SNK-001</div>
                            <div><span class="font-medium">Category:</span> Footwear</div>
                            <div><span class="font-medium">Price:</span> $79.99</div>
                            <div><span class="font-medium">Stock:</span> 45 units</div>
                            <div><span class="font-medium">Status:</span> <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span></div>
                            <div><span class="font-medium">Description:</span><br>Comfortable and stylish white sneakers perfect for everyday wear.</div>
                        </div>
                    </div>
                </div>
            `;
            
            document.getElementById('productDetailsContent').innerHTML = content;
            document.getElementById('viewProductModal').classList.remove('hidden');
        }

        function closeViewProductModal() {
            document.getElementById('viewProductModal').classList.add('hidden');
        }

        // Delete Product
        let deleteProductId = null;

        function deleteProduct(id) {
            deleteProductId = id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            deleteProductId = null;
        }

        function confirmDelete() {
            if (deleteProductId) {
                // In real implementation, send DELETE request via AJAX
                console.log('Deleting product:', deleteProductId);
                
                // Simulate success
                closeDeleteModal();
                alert('Product deleted successfully!');
                
                // Remove row from table (for demo)
                // In real app, reload the table data
            }
        }

        // Image Preview
        function previewImages(event) {
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = '';
            
            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'relative';
                    div.innerHTML = `
                        <img src="${e.target.result}" class="w-full h-24 object-cover rounded-lg">
                        <button type="button" onclick="removeImage(this)" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-600">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    `;
                    preview.appendChild(div);
                }
                
                reader.readAsDataURL(file);
            }
        }

        function removeImage(button) {
            button.parentElement.remove();
        }

        // Initialize - show products by default
        document.addEventListener('DOMContentLoaded', function() {
            showSection('products');
        });
    </script>
</body>
</html>

