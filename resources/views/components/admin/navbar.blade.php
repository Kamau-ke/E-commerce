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
                            <form  class="block px-4 py-2 text-red-600 hover:bg-gray-100" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button><i class="fas fa-sign-out-alt mr-2"></i> Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @push('scripts')
        <script>
             document.getElementById('profileToggle').addEventListener('click', function(e) {
            e.stopPropagation();
            document.getElementById('profileDropdown').classList.toggle('hidden');
        });

        document.addEventListener('click', function() {
            document.getElementById('profileDropdown').classList.add('hidden');
        });
        </script>
    @endpush