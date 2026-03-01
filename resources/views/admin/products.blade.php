<x-layouts.admin>
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
</x-layouts.admin>
