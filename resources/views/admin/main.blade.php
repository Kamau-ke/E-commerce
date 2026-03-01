<x-layouts.admin>
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
</x-layouts.admin>            
