<x-layouts.admin title="Products">
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
                            <option>Men Fashion</option>
                            <option>Women Fashion</option>
                            <option>Footware</option>
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

            <div id="productModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
                <div class="p-6 border-b flex justify-between items-center sticky top-0 bg-white">
                    <h3 class="text-2xl font-bold text-gray-800" id="modalTitle">Add New Product</h3>
                    <button onclick="closeProductModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
                
                <form id="productForm" class="p-6"  method="POST"  enctype="multipart/form-data" >
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
                                <option value="1">Men Fashion</option>
                                <option value="2">Women Fashion</option>
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
    
    @push('scripts')
        <script>
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
        </script>
    @endpush
</x-layouts.admin>
