<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - ModernShop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <a href="ecommerce-home.html" class="inline-block">
                <h1 class="text-4xl font-bold text-indigo-600 mb-2">ModernShop</h1>
            </a>
            <p class="text-gray-600">Create your account and start shopping</p>
        </div>

        <!-- Signup Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Sign Up</h2>
            
            <!-- Social Signup Buttons -->
            <div class="space-y-3 mb-6">
                <button class="w-full flex items-center justify-center gap-3 bg-white border-2 border-gray-200 rounded-lg px-4 py-3 font-semibold text-gray-700 hover:bg-gray-50 hover:border-gray-300 transition">
                    <i class="fab fa-google text-red-500 text-xl"></i>
                    Sign up with Google
                </button>
                <button class="w-full flex items-center justify-center gap-3 bg-white border-2 border-gray-200 rounded-lg px-4 py-3 font-semibold text-gray-700 hover:bg-gray-50 hover:border-gray-300 transition">
                    <i class="fab fa-facebook-f text-blue-600 text-xl"></i>
                    Sign up with Facebook
                </button>
            </div>

            <!-- Divider -->
            <div class="relative mb-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-500">Or sign up with email</span>
                </div>
            </div>

            <!-- Signup Form -->
            <form class="space-y-4">
                <!-- Full Name Input -->
                <div>
                    <label for="fullname" class="block text-sm font-medium text-gray-700 mb-2">
                        Full Name
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input 
                            type="text" 
                            id="fullname" 
                            name="fullname"
                            placeholder="John Doe"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            required
                        >
                    </div>
                </div>

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input 
                            type="email" 
                            id="email" 
                            name="email"
                            placeholder="you@example.com"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            required
                        >
                    </div>
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input 
                            type="password" 
                            id="password" 
                            name="password"
                            placeholder="Create a password"
                            class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            required
                        >
                        <button 
                            type="button" 
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600"
                            onclick="togglePassword('password', 'toggleIcon1')"
                        >
                            <i class="fas fa-eye" id="toggleIcon1"></i>
                        </button>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters</p>
                </div>

                <!-- Confirm Password Input -->
                <div>
                    <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-2">
                        Confirm Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input 
                            type="password" 
                            id="confirmPassword" 
                            name="confirmPassword"
                            placeholder="Confirm your password"
                            class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            required
                        >
                        <button 
                            type="button" 
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600"
                            onclick="togglePassword('confirmPassword', 'toggleIcon2')"
                        >
                            <i class="fas fa-eye" id="toggleIcon2"></i>
                        </button>
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-start">
                    <input 
                        type="checkbox" 
                        id="terms"
                        class="w-4 h-4 mt-1 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                        required
                    >
                    <label for="terms" class="ml-2 text-sm text-gray-700">
                        I agree to the 
                        <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">Terms of Service</a> 
                        and 
                        <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">Privacy Policy</a>
                    </label>
                </div>

                <!-- Newsletter Subscription -->
                <div class="flex items-start">
                    <input 
                        type="checkbox" 
                        id="newsletter"
                        class="w-4 h-4 mt-1 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                    >
                    <label for="newsletter" class="ml-2 text-sm text-gray-700">
                        Send me exclusive offers and updates via email
                    </label>
                </div>

                <!-- Signup Button -->
                <button 
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 transition"
                >
                    Create Account
                </button>
            </form>

            <!-- Login Link -->
            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    Already have an account? 
                    <a href="{{ route('showLogin') }}" class="text-indigo-600 hover:text-indigo-700 font-semibold">Login</a>
                </p>
            </div>
        </div>

        <!-- Security Badge -->
        <div class="mt-6 text-center">
            <div class="inline-flex items-center gap-2 text-sm text-gray-600 bg-white px-4 py-2 rounded-lg shadow-sm">
                <i class="fas fa-shield-alt text-green-500"></i>
                <span>Your information is secure and encrypted</span>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Optional: Add password strength indicator
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            // You can add password strength validation here
        });

        // Optional: Add password match validation
        document.getElementById('confirmPassword').addEventListener('input', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = e.target.value;
            
            if (password !== confirmPassword && confirmPassword.length > 0) {
                e.target.classList.add('border-red-500');
                e.target.classList.remove('border-gray-300');
            } else {
                e.target.classList.remove('border-red-500');
                e.target.classList.add('border-gray-300');
            }
        });
    </script>
</body>
</html>
