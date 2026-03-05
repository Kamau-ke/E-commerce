console.log('hello world')
        // Navigation
        

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
    