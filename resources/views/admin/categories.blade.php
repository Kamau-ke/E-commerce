<x-layouts.admin title="Categories">

    <!-- Main Content -->
   
        <div class="p-6">
            <!-- Flash Messages -->
            @if (session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-0.5 mr-3"></i>
                <div class="flex-1">
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            @endif

            @if (session('error'))
            <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg flex items-start">
                <i class="fas fa-exclamation-circle text-red-500 mt-0.5 mr-3"></i>
                <div class="flex-1">
                    <p class="font-medium">{{ session('error') }}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            @endif

            @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-circle text-red-500 mt-0.5 mr-3"></i>
                    <div class="flex-1">
                        <p class="font-semibold mb-1">Please fix the following errors:</p>
                        <ul class="list-disc list-inside space-y-1 text-sm">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button onclick="this.parentElement.parentElement.remove()" class="text-red-500 hover:text-red-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            @endif

            <!-- Page Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Categories Management</h2>
                <button onclick="showAddCategoryModal()" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                    <i class="fas fa-plus mr-2"></i> Add Category
                </button>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Total Categories</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">12</h3>
                        </div>
                        <div class="bg-indigo-100 w-12 h-12 rounded-full flex items-center justify-center">
                            <i class="fas fa-tags text-indigo-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Active Categories</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">10</h3>
                        </div>
                        <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center">
                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Products</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">342</h3>
                        </div>
                        <div class="bg-blue-100 w-12 h-12 rounded-full flex items-center justify-center">
                            <i class="fas fa-box text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Featured</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">5</h3>
                        </div>
                        <div class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center">
                            <i class="fas fa-star text-yellow-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters & Search -->
           <x-admin.filter/>

            <!-- Categories Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Products</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Featured</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <!-- Sample Data Row 1 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded flex items-center justify-center bg-gradient-to-br from-pink-400 to-rose-500">
                                            <i class="fas fa-tshirt text-white"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Women's Fashion</div>
                                            <div class="text-sm text-gray-500">womens-fashion</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">
                                    Clothing, Accessories & More
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="font-medium">45</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="text-yellow-500">
                                        <i class="fas fa-star"></i>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">1</td>
                                <td class="px-6 py-4 text-sm">
                                    <button onclick="editCategory(1)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="deleteCategory(1)" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Sample Data Row 2 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded flex items-center justify-center bg-gradient-to-br from-blue-400 to-indigo-500">
                                            <i class="fas fa-user-tie text-white"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Men's Fashion</div>
                                            <div class="text-sm text-gray-500">mens-fashion</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">
                                    Shirts, Pants & Accessories
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="font-medium">38</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="text-gray-300">
                                        <i class="far fa-star"></i>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">2</td>
                                <td class="px-6 py-4 text-sm">
                                    <button onclick="editCategory(2)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="deleteCategory(2)" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Sample Data Row 3 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded flex items-center justify-center bg-gradient-to-br from-purple-400 to-pink-500">
                                            <i class="fas fa-shoe-prints text-white"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Footwear</div>
                                            <div class="text-sm text-gray-500">footwear</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">
                                    Shoes, Sneakers & Sandals
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="font-medium">62</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="text-yellow-500">
                                        <i class="fas fa-star"></i>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">3</td>
                                <td class="px-6 py-4 text-sm">
                                    <button onclick="editCategory(3)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="deleteCategory(3)" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Sample Data Row 4 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded flex items-center justify-center bg-gradient-to-br from-amber-400 to-orange-500">
                                            <i class="fas fa-gem text-white"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Accessories</div>
                                            <div class="text-sm text-gray-500">accessories</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">
                                    Jewelry, Bags & Watches
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="font-medium">29</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="text-gray-300">
                                        <i class="far fa-star"></i>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">4</td>
                                <td class="px-6 py-4 text-sm">
                                    <button onclick="editCategory(4)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="deleteCategory(4)" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Sample Data Row 5 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded flex items-center justify-center bg-gradient-to-br from-green-400 to-emerald-500">
                                            <i class="fas fa-mobile-alt text-white"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Electronics</div>
                                            <div class="text-sm text-gray-500">electronics</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">
                                    Phones, Laptops & Gadgets
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="font-medium">54</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Inactive
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="text-yellow-500">
                                        <i class="fas fa-star"></i>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">5</td>
                                <td class="px-6 py-4 text-sm">
                                    <button onclick="editCategory(5)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="deleteCategory(5)" class="text-red-600 hover:text-red-900">
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
                        Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">12</span> results
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
 

    <!-- Add/Edit Category Modal -->
    <div id="categoryModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                <div class="p-6 border-b flex justify-between items-center sticky top-0 bg-white">
                    <h3 class="text-2xl font-bold text-gray-800" id="modalTitle">Add New Category</h3>
                    <button onclick="closeCategoryModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
                
                <form id="categoryForm" class="p-6" action="{{ route('categories.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="categoryId" name="category_id">
                    <input type="hidden" id="formMethod" name="_method" value="POST">
                    
                    <div class="space-y-4">
                        <!-- Category Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category Name *</label>
                            <input type="text" 
                                   name="name" 
                                   id="categoryName" 
                                   required 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                   placeholder="Enter category name">
                        </div>

                        <!-- Description -->
                        {{-- <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" 
                                      id="categoryDescription" 
                                      rows="3" 
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                      placeholder="Enter category description"></textarea>
                        </div> --}}

                       
                       
                        <!-- Parent Category -->
                        {{-- <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Parent Category</label>
                            <select name="parent_id" 
                                    id="categoryParent" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="">None (Top Level)</option>
                                <option value="1">Women's Fashion</option>
                                <option value="2">Men's Fashion</option>
                                <option value="3">Footwear</option>
                                <option value="4">Accessories</option>
                                <option value="5">Electronics</option>
                            </select>
                        </div> --}}

                        <!-- Icon Selection -->
                        {{-- <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
                            <select name="icon" 
                                    id="categoryIcon" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="fa-tshirt"> T-Shirt</option>
                                <option value="fa-user-tie"> Formal Wear</option>
                                <option value="fa-shoe-prints"> Shoes</option>
                                <option value="fa-gem"> Accessories</option>
                                <option value="fa-mobile-alt"> Electronics</option>
                                <option value="fa-dumbbell">Sports</option>
                                <option value="fa-heart"> Beauty</option>
                                <option value="fa-couch"> Home</option>
                                <option value="fa-book"> Books</option>
                                <option value="fa-gamepad"> Gaming</option>
                                <option value="fa-tags"> General</option>
                            </select>
                        </div> --}}

                        <!-- Color Selection -->
                       

                        <!-- Category Image -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category Image (Optional)</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-indigo-500 transition">
                                <input type="file" 
                                       name="image" 
                                       id="categoryImage" 
                                       accept="image/*" 
                                       class="hidden" 
                                       onchange="previewImage(event)">
                                <label for="categoryImage" class="cursor-pointer">
                                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                                    <p class="text-gray-600">Click to upload image</p>
                                    <p class="text-sm text-gray-400 mt-1">PNG, JPG up to 5MB</p>
                                </label>
                            </div>
                            <div id="imagePreview" class="mt-4 hidden">
                                <img id="previewImg" class="w-32 h-32 object-cover rounded-lg mx-auto">
                            </div>
                        </div>

                        <!-- Display Order -->
                        {{-- <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                            <input type="number" 
                                   name="order" 
                                   id="categoryOrder" 
                                   min="0"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                   placeholder="0">
                            <p class="text-xs text-gray-500 mt-1">Lower numbers appear first</p>
                        </div> --}}

                        <!-- Status & Featured -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select name="status" 
                                        id="categoryStatus" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Featured</label>
                                <label class="flex items-center mt-2">
                                    <input type="checkbox" 
                                           name="is_featured" 
                                           id="categoryFeatured" 
                                           class="w-5 h-5 text-indigo-600 rounded focus:ring-indigo-500">
                                    <span class="ml-2 text-gray-700">Show on homepage</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-4 mt-6 pt-6 border-t">
                        <button type="button" 
                                onclick="closeCategoryModal()" 
                                class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-save mr-2"></i> Save Category
                        </button>
                    </div>
                </form>
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
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Delete Category</h3>
                    <p class="text-sm text-gray-500 mb-6">Are you sure you want to delete this category? All products in this category will be uncategorized.</p>
                    
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <div class="flex justify-center space-x-4">
                            <button type="button" 
                                    onclick="closeDeleteModal()" 
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                                Cancel
                            </button>
                            <button type="submit" 
                                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                                Delete
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sidebar Toggle
 

        // Show add category modal
        function showAddCategoryModal() {
            document.getElementById('modalTitle').textContent = 'Add New Category';
            document.getElementById('categoryForm').reset();
            document.getElementById('categoryId').value = '';
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('categoryModal').classList.remove('hidden');
        }

        // Close category modal
        function closeCategoryModal() {
            document.getElementById('categoryModal').classList.add('hidden');
        }

        // Edit category
        function editCategory(id) {
            document.getElementById('modalTitle').textContent = 'Edit Category';
            document.getElementById('categoryId').value = id;
            document.getElementById('formMethod').value = 'PUT';
         
            
            // In real app, fetch and populate category data via AJAX
            document.getElementById('categoryName').value = 'Women\'s Fashion';
            document.getElementById('categoryDescription').value = 'Clothing, Accessories & More';
            document.getElementById('categorySlug').value = 'womens-fashion';
            
            document.getElementById('categoryModal').classList.remove('hidden');
        }

        // Delete category
        function deleteCategory(id) {
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = `/admin/categories/${id}`;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Select color
   

      
    
    </script>
</x-layouts.admin>