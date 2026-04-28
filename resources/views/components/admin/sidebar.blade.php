<aside id="sidebar" class="fixed left-0 top-16 h-full w-64 bg-white shadow-lg transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-40">
        <div class="p-4 h-full overflow-y-auto">
            <nav class="space-y-1">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition">
                    <i class="fas fa-home mr-3 text-lg"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                
                <!-- Products -->
                <a href="{{ route('admin.products') }}"  class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition">
                    <i class="fas fa-box mr-3 text-lg"></i>
                    <span class="font-medium">Products</span>
                </a>
                
                <!-- Categories -->
                <a href="{{ route('categories.index') }}"  class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition">
                    <i class="fas fa-tags mr-3 text-lg"></i>
                    <span class="font-medium">Categories</span>
                </a>
                
                <!-- Orders -->
                <a href="#"  class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition">
                    <i class="fas fa-shopping-cart mr-3 text-lg"></i>
                    <span class="font-medium">Orders</span>
                </a>
                
                <!-- Customers -->
                <a href="#" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition">
                    <i class="fas fa-users mr-3 text-lg"></i>
                    <span class="font-medium">Customers</span>
                </a>
                
                <!-- Analytics -->
                <a href="#"  class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition">
                    <i class="fas fa-chart-line mr-3 text-lg"></i>
                    <span class="font-medium">Analytics</span>
                </a>
                
                <!-- Reviews -->
                <a href="#"  class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition">
                    <i class="fas fa-star mr-3 text-lg"></i>
                    <span class="font-medium">Reviews</span>
                </a>
                
                <!-- Settings -->
                <a href="#" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition">
                    <i class="fas fa-cog mr-3 text-lg"></i>
                    <span class="font-medium">Settings</span>
                </a>
            </nav>
        </div>
    </aside>

    @push('scripts')
        <script>
              function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        document.getElementById('menuToggle').addEventListener('click', toggleSidebar);
        </script>
    @endpush