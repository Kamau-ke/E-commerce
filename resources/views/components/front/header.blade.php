<nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <h1 class="text-2xl font-bold text-indigo-600">ModernShop</h1>
                </a>
            </div>

            <!-- Search Bar (desktop) -->
            <div class="hidden md:flex flex-1 max-w-sm mx-8">
                <div class="relative w-full flex">
                    <input type="text" placeholder="Search products..."
                           class="w-full px-4 py-2 text-sm border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-r-lg transition-colors duration-200">
                        <i class="fas fa-search text-sm"></i>
                    </button>
                </div>
            </div>

            <!-- Right Icons -->
            <div class="flex items-center space-x-5">

                <!-- Mobile Search -->
                <button id="mobileSearchBtn" class="md:hidden text-gray-700 hover:text-indigo-600 focus:outline-none">
                    <i class="fas fa-search text-xl"></i>
                </button>

                @auth
                    <!-- Cart (only for logged-in users) -->
                    <a href="{{ route('user.cart') }}" class="relative text-gray-700 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-indigo-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                    </a>

                    <!-- Profile Dropdown -->
                    <div class="relative" id="profileWrapper">
                        <button id="profileBtn" class="flex items-center gap-2 text-gray-700 hover:text-indigo-600 focus:outline-none transition-colors">
                            <i class="fas fa-user text-xl"></i>
                            <span class="hidden sm:inline text-sm font-medium">Account</span>
                            <i id="chevronIcon" class="hidden sm:inline fas fa-chevron-down text-xs transition-transform duration-200"></i>
                        </button>

                        <!-- Dropdown -->
                        <div id="profileModal"
                             class="hidden absolute right-0 mt-3 w-52 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50">
                            <div class="px-4 py-2 border-b border-gray-100 mb-1">
                                <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">My Account</p>
                            </div>
                            <a href="account.html"
                               class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                <i class="fas fa-user-circle w-4 text-center text-gray-400"></i>
                                Account
                            </a>
                            <a href="orders.html"
                               class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                <i class="fas fa-box w-4 text-center text-gray-400"></i>
                                Orders
                            </a>
                            <a href="wishlist.html"
                               class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                <i class="fas fa-heart w-4 text-center text-gray-400"></i>
                                Wishlist
                            </a>
                            {{-- check if user is admin --}}
                             @if(Auth::user()->role === 'admin')
                                <div class="border-t border-gray-100 mt-1 pt-1">
                                    <a href="{{ route('admin.dashboard') }}"
                                    class="flex items-center gap-3 px-4 py-2.5 text-sm text-indigo-600 hover:bg-indigo-50 transition-colors font-medium">
                                        <i class="fas fa-gauge w-4 text-center text-indigo-400"></i>
                                        Admin Dashboard
                                    </a>
                                </div>
                            @endif
                            
                            <div class="border-t border-gray-100 mt-1 pt-1">
                                <div class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 transition-colors cursor-pointer">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="flex items-center gap-3">
                                            <i class="fas fa-sign-out-alt w-4 text-center"></i>
                                            Sign Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth

                @guest
                    <!-- Login & Signup Buttons (guests only) -->
                    <div class="hidden sm:flex items-center gap-2">
                        <a href="{{ route('login') }}"
                           class="text-sm font-medium text-gray-700 hover:text-indigo-600 px-4 py-2 rounded-lg border border-gray-300 hover:border-indigo-400 transition-colors duration-200">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                           class="text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg transition-colors duration-200">
                            Sign Up
                        </a>
                    </div>

                    <!-- Mobile: just user icon linking to login -->
                    <a href="{{ route('login') }}" class="sm:hidden text-gray-700 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-user text-xl"></i>
                    </a>
                @endguest

                <!-- Mobile Hamburger -->
                <button id="mobileMenuBtn" class="md:hidden text-gray-700 hover:text-indigo-600 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Search Bar -->
    <div id="mobileSearch" class="hidden md:hidden border-t border-gray-100 px-4 py-3">
        <div class="flex">
            <input type="text" placeholder="Search products..."
                   class="w-full px-4 py-2 text-sm border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-r-lg transition-colors">
                <i class="fas fa-search text-sm"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden border-t border-gray-100">
        <div class="px-4 py-3 space-y-1">
            <a href="#" class="block px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">Home</a>
            <a href="#" class="block px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">Shop</a>
            <a href="#" class="block px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">Categories</a>
            <a href="#" class="block px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">Deals</a>

            @guest
                <!-- Mobile Login/Signup in hamburger menu -->
                <div class="pt-2 border-t border-gray-100 flex flex-col gap-2">
                    <a href="{{ route('login') }}"
                       class="block px-3 py-2 rounded-lg text-sm font-medium text-center text-gray-700 border border-gray-300 hover:border-indigo-400 hover:text-indigo-600 transition-colors">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="block px-3 py-2 rounded-lg text-sm font-medium text-center text-white bg-indigo-600 hover:bg-indigo-700 transition-colors">
                        Sign Up
                    </a>
                </div>
            @endguest
        </div>
    </div>
</nav>

<script>
    // Profile dropdown
    const profileBtn = document.getElementById('profileBtn');
    const profileModal = document.getElementById('profileModal');
    const profileWrapper = document.getElementById('profileWrapper');
    const chevronIcon = document.getElementById('chevronIcon');

    profileBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        profileModal.classList.toggle('hidden');
        chevronIcon.classList.toggle('rotate-180');
    });

    document.addEventListener('click', (e) => {
        if (!profileWrapper.contains(e.target)) {
            profileModal.classList.add('hidden');
            chevronIcon.classList.remove('rotate-180');
        }
    });

    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Mobile search toggle
    const mobileSearchBtn = document.getElementById('mobileSearchBtn');
    const mobileSearch = document.getElementById('mobileSearch');

    mobileSearchBtn.addEventListener('click', () => {
        mobileSearch.classList.toggle('hidden');
    });
</script>