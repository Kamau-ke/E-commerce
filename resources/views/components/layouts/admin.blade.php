<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ModernShop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Top Navigation Bar -->
    <x-admin.navbar/>
    <x-admin.sidebar/>
    <main class="lg:ml-64 pt-16 min-h-screen">
        <div class="p-6">
             {{ $slot }}
        </div>
    </main>
   
</body>
</html>

