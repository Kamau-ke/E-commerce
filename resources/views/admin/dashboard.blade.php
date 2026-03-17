<x-layouts.admin title="Dashboard">

   

    <!-- Overlay for mobile -->
    <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden" onclick="toggleSidebar()"></div>

    <!-- Main Content -->
    
            <!-- Dashboard Section -->
            

            <!-- Products Section -->
           

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

    
</x-layouts.admin>

