@props(['title'=>'', 'message'=>''])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ModernShop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <a href="{{route('home')}}" class="inline-block">
                <h1 class="text-4xl font-bold text-indigo-600 mb-2">ModernShop</h1>
            </a>
            <p class="text-gray-600">{{ $message }}</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">{{$title}}</h2>
            
            <!-- Social Login Buttons -->
            <div class="space-y-3 mb-6">
               <x-socials.facebook-button/>
               <x-socials.google-button/>
                
            </div>

            <!-- Divider -->
            <div class="relative mb-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-500">Or continue with email</span>
                </div>
            </div>

           {{ $slot }}

</body>
</html>

        
