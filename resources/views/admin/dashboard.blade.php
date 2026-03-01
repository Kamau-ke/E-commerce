<x-layouts.admin>

   

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
</x-layouts.admin>

