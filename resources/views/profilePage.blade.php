<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} — My Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .tab-btn.active { background: linear-gradient(to right, #4f46e5, #7c3aed); color: white; border-color: transparent; }
        .avatar-ring { background: linear-gradient(135deg, #4f46e5, #7c3aed, #ec4899); padding: 3px; border-radius: 9999px; }
        .stat-card { transition: transform 0.2s; }
        .stat-card:hover { transform: translateY(-2px); }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

    <x-front.header />

    {{-- Cover Banner --}}
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 h-48 relative">
        <div class="absolute inset-0 opacity-10"
             style="background-image: radial-gradient(circle at 20% 50%, white 1px, transparent 1px),
                                      radial-gradient(circle at 80% 20%, white 1px, transparent 1px);
                    background-size: 40px 40px;">
        </div>
        <button class="absolute top-4 right-4 bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg text-sm font-medium backdrop-blur-sm transition flex items-center gap-2">
            <i class="fas fa-camera text-xs"></i> Change Cover
        </button>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Profile Header Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 -mt-16 mb-6 px-6 pt-6 pb-5 relative">
            <div class="flex flex-col sm:flex-row sm:items-end gap-4">

                {{-- Avatar --}}
                <div class="avatar-ring w-28 h-28 flex-shrink-0 -mt-16 sm:-mt-20 relative">
                    @if ($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}"
                             alt="{{ $user->name }}"
                             class="w-full h-full rounded-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-indigo-400 to-purple-600 rounded-full flex items-center justify-center text-white text-3xl font-bold">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" id="avatar-form">
                        @csrf
                        @method('PATCH')
                        <label class="absolute bottom-0 right-0 w-8 h-8 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full flex items-center justify-center shadow-lg transition cursor-pointer">
                            <i class="fas fa-camera text-xs"></i>
                            <input type="file" name="avatar" class="hidden" onchange="document.getElementById('avatar-form').submit()">
                        </label>
                    </form>
                </div>

                {{-- Name & Actions --}}
                <div class="flex-1">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h1>
                            <p class="text-gray-500 text-sm flex items-center gap-2 mt-0.5">
                                @if ($user->city)
                                    <i class="fas fa-map-marker-alt text-indigo-400 text-xs"></i>
                                    {{ $user->city }}{{ $user->country ? ', ' . $user->country : '' }}
                                    &nbsp;·&nbsp;
                                @endif
                                <i class="fas fa-calendar-alt text-indigo-400 text-xs"></i>
                                Member since {{ $user->created_at->format('M Y') }}
                            </p>
                        </div>
                        <div class="flex gap-2">
                            <button onclick="switchTab('edit')"
                                    class="border border-indigo-200 text-indigo-600 hover:bg-indigo-50 px-4 py-2 rounded-lg text-sm font-medium transition flex items-center gap-2">
                                <i class="fas fa-pen text-xs"></i> Edit Profile
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Stats Row --}}
            <div class="grid grid-cols-4 gap-3 mt-6 pt-5 border-t border-gray-100">
                <div class="stat-card text-center bg-indigo-50 rounded-xl p-3">
                    <p class="text-2xl font-bold text-indigo-600">2</p>
                    <p class="text-xs text-gray-500 mt-0.5">Total Orders</p>
                </div>
                <div class="stat-card text-center bg-purple-50 rounded-xl p-3">
                    <p class="text-2xl font-bold text-purple-600">$300</p>
                    <p class="text-xs text-gray-500 mt-0.5">Total Spent</p>
                </div>
                <div class="stat-card text-center bg-pink-50 rounded-xl p-3">
                    <p class="text-2xl font-bold text-pink-600">4</p>
                    <p class="text-xs text-gray-500 mt-0.5">Wishlist Items</p>
                </div>
                <div class="stat-card text-center bg-green-50 rounded-xl p-3">
                    <p class="text-2xl font-bold text-green-600">5</p>
                    <p class="text-xs text-gray-500 mt-0.5">Loyalty Tier</p>
                </div>
            </div>
        </div>

        {{-- Tabs --}}
        <div class="flex gap-2 mb-6 bg-white p-1.5 rounded-xl border border-gray-100 shadow-sm w-fit">
            <button onclick="switchTab('overview')" id="tab-overview"
                    class="tab-btn active px-5 py-2 rounded-lg text-sm font-medium border border-transparent transition">
                Overview
            </button>
            <button onclick="switchTab('orders')" id="tab-orders"
                    class="tab-btn px-5 py-2 rounded-lg text-sm font-medium border border-gray-200 text-gray-500 hover:text-gray-700 transition">
                Orders
            </button>
            <button onclick="switchTab('edit')" id="tab-edit"
                    class="tab-btn px-5 py-2 rounded-lg text-sm font-medium border border-gray-200 text-gray-500 hover:text-gray-700 transition">
                Edit Profile
            </button>
            <button onclick="switchTab('security')" id="tab-security"
                    class="tab-btn px-5 py-2 rounded-lg text-sm font-medium border border-gray-200 text-gray-500 hover:text-gray-700 transition">
                Security
            </button>
        </div>

        {{-- ─── TAB: OVERVIEW ─────────────────────────────────────── --}}
        <div id="pane-overview" class="grid md:grid-cols-3 gap-6 mb-10">

            {{-- About Card --}}
            <div class="md:col-span-2 bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-indigo-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-envelope text-indigo-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Email</p>
                            <p class="text-gray-700 font-medium">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-phone text-purple-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Phone</p>
                            <p class="text-gray-700 font-medium">{{ $user->phone ?? '—' }}</p>
                        </div>
                    </div>
                   
                    @if ($user->city)
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-green-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Location</p>
                            <p class="text-gray-700 font-medium">{{ $user->city }}, {{ $user->country }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="flex flex-col gap-4">
                {{-- Loyalty Card --}}
                <div class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-2xl p-5 text-white">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-indigo-200 text-xs font-medium uppercase tracking-wide">Loyalty Program</p>
                            {{-- <p class="text-xl font-bold mt-0.5">{{ $user->loyalty_tier ?? 'Basic' }} Member</p> --}}
                        </div>
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-crown text-yellow-300 text-lg"></i>
                        </div>
                    </div>
                    {{-- @php
                        $points     = $user->loyalty_points ?? 0;
                        $nextTarget = 2000;
                        $progress   = min(100, round(($points / $nextTarget) * 100));
                    @endphp --}}
                    <div class="mb-2">
                        <div class="flex justify-between text-xs text-indigo-200 mb-1">
                            {{-- <span>{{ number_format($points) }} pts</span>
                            <span>{{ number_format($nextTarget) }} pts for Platinum</span> --}}
                        </div>
                        <div class="bg-white/20 rounded-full h-2">
                            <div class="bg-yellow-300 h-2 rounded-full transition-all" style="width: 10%"></div>
                        </div>
                    </div>
                    <p class="text-xs text-indigo-200">20 points to Platinum tier</p>
                </div>

                {{-- Default Address --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                    <h3 class="text-sm font-semibold text-gray-800 mb-3 flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-indigo-500 text-xs"></i> Default Address
                    </h3>
                    @if ($user->address)
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $user->address }}</p>
                    @else
                        <p class="text-sm text-gray-400 italic">No address saved.</p>
                    @endif
                    <button onclick="switchTab('edit')" class="mt-3 text-indigo-600 text-xs font-medium hover:underline">
                        Change address →
                    </button>
                </div>
            </div>

            {{-- Recent Orders --}}
            <div class="md:col-span-3 bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-box text-indigo-500"></i> Recent Orders
                    </h2>
                    <button onclick="switchTab('orders')" class="text-indigo-600 text-sm font-medium hover:text-indigo-700">
                        View All →
                    </button>
                </div>

                {{-- @forelse ($user->orders->take(3) as $order)
                <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition cursor-pointer">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-box text-indigo-600"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-gray-800 text-sm truncate">
                            {{ $order->items->first()?->product->name ?? 'Order Items' }}
                            @if ($order->items->count() > 1)
                                <span class="text-gray-400 text-xs">(+{{ $order->items->count() - 1 }} more)</span>
                            @endif
                        </p>
                        <p class="text-gray-400 text-xs">Order #{{ $order->order_number }} · {{ $order->created_at->format('M d, Y') }}</p>
                    </div>
                    <div class="text-right flex-shrink-0">
                        <p class="font-semibold text-gray-800 text-sm">${{ number_format($order->total, 2) }}</p>
                        <span class="text-xs px-2 py-0.5 rounded-full font-medium
                            @if ($order->status === 'delivered') bg-green-100 text-green-700
                            @elseif ($order->status === 'shipped')  bg-indigo-100 text-indigo-700
                            @elseif ($order->status === 'processing') bg-yellow-100 text-yellow-700
                            @else bg-gray-100 text-gray-600 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
                @empty
                    <p class="text-sm text-gray-400 text-center py-8">You haven't placed any orders yet.</p>
                @endforelse --}}
            </div>
        </div>

        {{-- ─── TAB: ORDERS ────────────────────────────────────────── --}}
        <div id="pane-orders" class="hidden mb-10">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-6">Order History</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-100">
                                <th class="text-left py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Order #</th>
                                <th class="text-left py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Product</th>
                                <th class="text-left py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Date</th>
                                <th class="text-left py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Total</th>
                                <th class="text-left py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            {{-- @forelse ($user->orders as $order)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-4 text-gray-500">#{{ $order->order_number }}</td>
                                <td class="py-4 font-medium text-gray-800">
                                    {{ $order->items->first()?->product->name ?? '—' }}
                                    @if ($order->items->count() > 1)
                                        <span class="text-gray-400 text-xs">(+{{ $order->items->count() - 1 }})</span>
                                    @endif
                                </td>
                                <td class="py-4 text-gray-500">{{ $order->created_at->format('M d, Y') }}</td>
                                <td class="py-4 font-semibold">${{ number_format($order->total, 2) }}</td>
                                <td class="py-4">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-medium
                                        @if ($order->status === 'delivered')  bg-green-100 text-green-700
                                        @elseif ($order->status === 'shipped')  bg-indigo-100 text-indigo-700
                                        @elseif ($order->status === 'processing') bg-yellow-100 text-yellow-700
                                        @else bg-gray-100 text-gray-600 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="py-4">
                                    <a href="{{ route('orders.show', $order) }}"
                                       class="text-indigo-600 text-xs font-medium hover:underline">
                                        Details
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="py-10 text-center text-gray-400 text-sm">No orders found.</td>
                            </tr>
                            @endforelse --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- ─── TAB: EDIT PROFILE ──────────────────────────────────── --}}
        <div id="pane-edit" class="hidden mb-10">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-6 flex items-center gap-2">
                    <i class="fas fa-pen text-indigo-500"></i> Edit Profile
                </h2>

                @if (session('success'))
                    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 text-sm rounded-xl px-4 py-3 flex items-center gap-2">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 text-sm rounded-xl px-4 py-3">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('user.update') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Names</label>
                            <input type="text" name="name"
                                   value="{{$user->name}}"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                        </div>
                      
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Email Address</label>
                            <input type="email" name="email"
                                   value="{{$user->email}}"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Phone Number</label>
                            <input type="tel" name="phone"
                                   value="{{$user->phone ?? '-'}}"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                        </div>
                        
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Gender</label>
                            <select name="gender"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition bg-white">
                                <option value="female" {{ $user->gender == 'female'     ? 'selected' : '' }}>Female</option>
                                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="other" {{ $user->gender == 'other'? 'selected' : '' }}>Other</option>
                                <option value="prefer_not"{{ $user->gender == 'prefer_not' ? 'selected' : '' }}>Prefer not to say</option>
                            </select>
                        </div>
                        
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Shipping Address</label>
                            <input type="text" name="address"
                                   value="{{$user->address ?? 'Not Provided'}}"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                        </div>
                       
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Country</label>
                            <input type="text" name="country"
                                   value="{{ $country }}"
                                   disabled
                                   class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                        </div>
                    </div>country

                    <div class="flex gap-3 mt-6 pt-5 border-t border-gray-100">
                        <button type="submit"
                                class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-2.5 rounded-xl text-sm font-semibold hover:opacity-90 transition">
                            Save Changes
                        </button>
                        <button type="button" onclick="switchTab('overview')"
                                class="border border-gray-200 text-gray-600 px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-gray-50 transition">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ─── TAB: SECURITY ──────────────────────────────────────── --}}
        <div id="pane-security" class="hidden mb-10 space-y-4">

            {{-- Change Password --}}
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-5 flex items-center gap-2">
                    <i class="fas fa-lock text-indigo-500"></i> Change Password
                </h2>
                <form  method="POST" class="max-w-md space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Current Password</label>
                        <input type="password" name="current_password" placeholder="••••••••"
                               class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">New Password</label>
                        <input type="password" name="password" placeholder="••••••••"
                               class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Confirm New Password</label>
                        <input type="password" name="password_confirmation" placeholder="••••••••"
                               class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                    <button type="submit"
                            class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-2.5 rounded-xl text-sm font-semibold hover:opacity-90 transition">
                        Update Password
                    </button>
                </form>
            </div>

            {{-- Security Settings --}}
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-shield-alt text-indigo-500"></i> Security Settings
                </h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between py-3 border-b border-gray-50">
                        <div>
                            <p class="text-sm font-medium text-gray-800">Two-Factor Authentication</p>
                            <p class="text-xs text-gray-500 mt-0.5">Add an extra layer of security to your account</p>
                        </div>
                        <a href="#"
                           class="bg-indigo-50 text-indigo-600 hover:bg-indigo-100 px-4 py-1.5 rounded-lg text-xs font-semibold transition">
                            Enable
                        </a>
                    </div>
                    <div class="flex items-center justify-between py-3 border-b border-gray-50">
                        <div>
                            <p class="text-sm font-medium text-gray-800">Login Notifications</p>
                            <p class="text-xs text-gray-500 mt-0.5">Get notified when someone logs into your account</p>
                        </div>
                        <form  method="POST">
                            @csrf @method('PATCH')
                            {{-- <input type="hidden" name="login_notifications" value="{{ $user->login_notifications ? '0' : '1' }}"> --}}
                            {{-- <button type="submit"
                                    class="w-10 h-6 {{ $user->login_notifications ? 'bg-indigo-600' : 'bg-gray-200' }} rounded-full relative transition-colors">
                                <div class="w-4 h-4 bg-white rounded-full absolute top-1 {{ $user->login_notifications ? 'right-1' : 'left-1' }} shadow-sm transition-all"></div>
                            </button> --}}
                        </form>
                    </div>
                    <div class="flex items-center justify-between py-3">
                        <div>
                            <p class="text-sm font-medium text-red-600">Delete Account</p>
                            <p class="text-xs text-gray-500 mt-0.5">Permanently delete your account and all data</p>
                        </div>
                        <form  method="POST"
                              onsubmit="return confirm('Are you sure? This cannot be undone.')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                    class="bg-red-50 text-red-600 hover:bg-red-100 px-4 py-1.5 rounded-lg text-xs font-semibold transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <x-front.footer />

    <script>
        function switchTab(tab) {
            const tabs = ['overview', 'orders', 'edit', 'security'];
            tabs.forEach(t => {
                document.getElementById('pane-' + t).classList.toggle('hidden', t !== tab);
                const btn = document.getElementById('tab-' + t);
                if (t === tab) {
                    btn.classList.add('active');
                    btn.classList.remove('border-gray-200', 'text-gray-500');
                } else {
                    btn.classList.remove('active');
                    btn.classList.add('border-gray-200', 'text-gray-500');
                }
            });
        }

        // Auto-open edit tab if there are validation errors
        @if ($errors->any())
            switchTab('edit');
        @endif

        // Auto-open edit tab if success message is present
        @if (session('success'))
            switchTab('edit');
        @endif
    </script>

</body>
</html>