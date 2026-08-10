<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Profile</title>
    <style>
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        input,
        select {
            border: 1.5px solid #e2e8f0 !important;
            transition: all 0.25s ease-in-out;
        }

        input:focus,
        select:focus {
            border-color: #4f46e5 !important;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15);
        }

        .gradient-cover {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #6366f1 100%);
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        input:checked+.toggle-dot {
            transform: translateX(20px);
            background-color: #4f46e5;
        }

        input:checked~.toggle-bg {
            background-color: #e0e7ff;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="min-h-screen py-10">
        <div class="max-w-5xl mx-auto px-6 fade-in">

            @session('success')
                <div class="w-full bg-green-50 border border-green-200 p-3 mb-5 rounded-xl flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-green-700 text-sm font-medium">{{ session('success') }}</span>
                </div>
            @endsession
            @session('error')
                <div class="w-full bg-red-50 border border-red-200 p-3 mb-5 rounded-xl flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-red-600 text-sm font-medium">{{ session('error') }}</span>
                </div>
            @endsession

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="h-44 gradient-cover relative overflow-hidden">
                    <div
                        class="absolute top-0 left-0 w-56 h-56 bg-white/10 rounded-full -translate-x-1/3 -translate-y-1/3">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full translate-x-1/3 translate-y-1/3">
                    </div>
                </div>
                <div class="px-8 pb-8">
                    <div class="flex flex-col md:flex-row items-center md:items-end gap-6 -mt-16">
                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=4f46e5&color=fff"
                            class="w-32 h-32 rounded-full border-4 border-white shadow-lg z-3">
                        <div class="text-center md:text-left pb-1">
                            <h1 class="text-3xl font-bold text-gray-900" style="padding-top:10px !important">
                                {{ auth()->user()->name }}
                            </h1>
                            <p class="text-gray-500 flex items-center gap-1.5 justify-center md:justify-start mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                {{ auth()->user()->email }} - @if (auth()->user()->role == 'admin')
                                    Admin
                                    <svg class="w-6 h-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 3l7 3v6c0 5-3.5 8-7 9-3.5-1-7-4-7-9V6l7-3z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 10a2 2 0 100-4 2 2 0 000 4zm-3 6a3 3 0 016 0" />
                                    </svg>
                                @elseif (auth()->user()->role == 'seller')
                                    Seller
                                    <svg class="w-6 h-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 9l1-5h16l1 5M5 9v10h14V9M9 19V13h6v6" />
                                    </svg>
                                @else
                                    User 👤
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-wrap justify-center md:justify-end gap-3 mt-6">
                        <a href="{{ url('/') }}"
                            class="flex items-center gap-2 bg-gray-100 text-gray-700 px-5 py-2.5 rounded-xl hover:bg-gray-200 transition font-medium text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Home
                        </a>
                        <a href="{{ route('update_password') }}"
                            class="flex items-center gap-2 bg-indigo-50 text-indigo-600 px-5 py-2.5 rounded-xl hover:bg-indigo-100 transition font-medium text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Update password
                        </a>
                        <a href="{{ route('logged_out') }}"
                            class="flex items-center gap-2 bg-red-50 text-red-600 px-5 py-2.5 rounded-xl hover:bg-red-100 transition font-medium text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Log out
                        </a>
                        <a href="@if (auth()->user()->role == 'admin') {{ route('admin-dashboard') }}@elseif (auth()->user()->role == 'seller') {{ route('seller-dashboard') }} @endif"
                            class="flex items-center gap-2 bg-red-50 text-red-600 px-5 py-2.5 rounded-xl hover:bg-red-100 transition font-medium text-sm">
                            @if (auth()->user()->role == 'user')
                                -
                            @else
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                                </svg>
                                Dashboard
                            @endif
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6 mt-8">
                <div class="md:col-span-2 bg-white rounded-2xl shadow p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">
                        About
                    </h2>
                    <div class="space-y-5">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-gray-400 text-sm">Name</span>
                                <p class="font-semibold text-gray-800">
                                    {{ auth()->user()->name }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-gray-400 text-sm">Email</span>
                                <p class="font-semibold text-gray-800">
                                    {{ auth()->user()->email }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-gray-400 text-sm">Joined At</span>
                                <p class="font-semibold text-gray-800">
                                    {{ auth()->user()->created_at->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">
                        Statistics
                    </h2>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center bg-gray-50 rounded-xl px-4 py-3.5">
                            <span class="text-gray-600 text-sm font-medium">Orders</span>
                            <span class="font-bold text-indigo-600 text-lg">
                                12
                            </span>
                        </div>
                        <div class="flex justify-between items-center bg-gray-50 rounded-xl px-4 py-3.5">
                            <span class="text-gray-600 text-sm font-medium">Products</span>
                            <span class="font-bold text-indigo-600 text-lg">
                                5
                            </span>
                        </div>
                        <div class="flex justify-between items-center bg-gray-50 rounded-xl px-4 py-3.5">
                            <span class="text-gray-600 text-sm font-medium">Reviews</span>
                            <span class="font-bold text-indigo-600 text-lg">
                                8
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow p-6 sm:p-8 mt-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        Recent Orders
                    </h2>
                    <a href="" class="text-indigo-600 text-sm font-medium hover:text-indigo-700">View all</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-left text-gray-400 border-b border-gray-100">
                                <th class="pb-3 font-medium">Order ID</th>
                                <th class="pb-3 font-medium">Date</th>
                                <th class="pb-3 font-medium">Total</th>
                                <th class="pb-3 font-medium">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            <tr>
                                <td class="py-3.5 font-semibold text-gray-800">#ORD-1042</td>
                                <td class="py-3.5 text-gray-500">24 Jul 2026</td>
                                <td class="py-3.5 text-gray-800">$129.00</td>
                                <td class="py-3.5">
                                    <span
                                        class="bg-green-50 text-green-600 text-xs font-semibold px-3 py-1 rounded-full">Delivered</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-3.5 font-semibold text-gray-800">#ORD-1038</td>
                                <td class="py-3.5 text-gray-500">18 Jul 2026</td>
                                <td class="py-3.5 text-gray-800">$64.50</td>
                                <td class="py-3.5">
                                    <span
                                        class="bg-amber-50 text-amber-600 text-xs font-semibold px-3 py-1 rounded-full">Shipping</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-3.5 font-semibold text-gray-800">#ORD-1029</td>
                                <td class="py-3.5 text-gray-500">05 Jul 2026</td>
                                <td class="py-3.5 text-gray-800">$212.90</td>
                                <td class="py-3.5">
                                    <span
                                        class="bg-red-50 text-red-600 text-xs font-semibold px-3 py-1 rounded-full">Cancelled</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow p-6 sm:p-8 mt-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        My Products
                    </h2>
                    <a href="" class="text-indigo-600 text-sm font-medium hover:text-indigo-700">+ Add
                        product</a>
                </div>
                <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="border border-gray-100 rounded-xl p-4 hover:shadow-md transition">
                        <div class="w-full h-28 bg-gray-100 rounded-lg mb-3"></div>
                        <p class="font-semibold text-gray-800 text-sm truncate">Wireless Mouse</p>
                        <p class="text-indigo-600 font-bold text-sm mt-1">$24.99</p>
                    </div>
                    <div class="border border-gray-100 rounded-xl p-4 hover:shadow-md transition">
                        <div class="w-full h-28 bg-gray-100 rounded-lg mb-3"></div>
                        <p class="font-semibold text-gray-800 text-sm truncate">Mechanical Keyboard</p>
                        <p class="text-indigo-600 font-bold text-sm mt-1">$89.00</p>
                    </div>
                    <div class="border border-gray-100 rounded-xl p-4 hover:shadow-md transition">
                        <div class="w-full h-28 bg-gray-100 rounded-lg mb-3"></div>
                        <p class="font-semibold text-gray-800 text-sm truncate">USB-C Hub</p>
                        <p class="text-indigo-600 font-bold text-sm mt-1">$39.50</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow p-6 sm:p-8 mt-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                    Recent Reviews
                </h2>
                <div class="space-y-5">
                    <div class="border-b border-gray-50 pb-5 last:border-0 last:pb-0">
                        <div class="flex items-center justify-between mb-1.5">
                            <p class="font-semibold text-gray-800 text-sm">Bluetooth Speaker</p>
                            <div class="flex gap-0.5">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 {{ $i < 4 ? 'text-amber-400' : 'text-gray-200' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.958a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.368 2.446a1 1 0 00-.363 1.118l1.287 3.957c.3.922-.755 1.688-1.538 1.118l-3.367-2.445a1 1 0 00-1.176 0l-3.367 2.445c-.783.57-1.838-.196-1.538-1.118l1.287-3.957a1 1 0 00-.363-1.118L2.063 9.385c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.951-.69l1.286-3.958z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm leading-relaxed">Great sound quality and battery life exceeded
                            my expectations. Would buy again.</p>
                        <p class="text-gray-300 text-xs mt-2">12 Jul 2026</p>
                    </div>
                    <div class="border-b border-gray-50 pb-5 last:border-0 last:pb-0">
                        <div class="flex items-center justify-between mb-1.5">
                            <p class="font-semibold text-gray-800 text-sm">Laptop Stand</p>
                            <div class="flex gap-0.5">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 {{ $i < 5 ? 'text-amber-400' : 'text-gray-200' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.958a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.368 2.446a1 1 0 00-.363 1.118l1.287 3.957c.3.922-.755 1.688-1.538 1.118l-3.367-2.445a1 1 0 00-1.176 0l-3.367 2.445c-.783.57-1.838-.196-1.538-1.118l1.287-3.957a1 1 0 00-.363-1.118L2.063 9.385c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.951-.69l1.286-3.958z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm leading-relaxed">Sturdy and well built, exactly as described in
                            the listing.</p>
                        <p class="text-gray-300 text-xs mt-2">29 Jun 2026</p>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6 mt-8">
                <div class="bg-white rounded-2xl shadow p-6 sm:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Saved Addresses
                        </h2>
                        <a href="" class="text-indigo-600 text-sm font-medium hover:text-indigo-700">+ Add</a>
                    </div>
                    <div class="space-y-3">
                        <div class="border border-gray-100 rounded-xl p-4 flex items-start justify-between">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <p class="font-semibold text-gray-800 text-sm">Home</p>
                                    <span
                                        class="bg-indigo-50 text-indigo-600 text-xs font-medium px-2 py-0.5 rounded-full">Default</span>
                                </div>
                                <p class="text-gray-500 text-sm">15 Al-Nasr St, Nasr City, Cairo</p>
                            </div>
                            <button class="text-gray-400 hover:text-indigo-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                        </div>
                        <div class="border border-gray-100 rounded-xl p-4 flex items-start justify-between">
                            <div>
                                <p class="font-semibold text-gray-800 text-sm mb-1">Work</p>
                                <p class="text-gray-500 text-sm">Smart Village, 6th of October, Giza</p>
                            </div>
                            <button class="text-gray-400 hover:text-indigo-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow p-6 sm:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Payment Methods
                        </h2>
                        <a href="" class="text-indigo-600 text-sm font-medium hover:text-indigo-700">+ Add</a>
                    </div>
                    <div class="space-y-3">
                        <div class="border border-gray-100 rounded-xl p-4 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-7 bg-indigo-600 rounded flex items-center justify-center text-white text-[10px] font-bold">
                                    VISA</div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">•••• •••• •••• 4831</p>
                                    <p class="text-gray-400 text-xs">Expires 09/28</p>
                                </div>
                            </div>
                            <span
                                class="bg-indigo-50 text-indigo-600 text-xs font-medium px-2 py-0.5 rounded-full">Default</span>
                        </div>
                        <div class="border border-gray-100 rounded-xl p-4 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-7 bg-gray-800 rounded flex items-center justify-center text-white text-[10px] font-bold">
                                    MC</div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">•••• •••• •••• 7710</p>
                                    <p class="text-gray-400 text-xs">Expires 02/27</p>
                                </div>
                            </div>
                            <button class="text-gray-400 hover:text-red-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow p-6 sm:p-8 mt-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        Wishlist
                    </h2>
                    <a href="" class="text-indigo-600 text-sm font-medium hover:text-indigo-700">View all</a>
                </div>
                <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="border border-gray-100 rounded-xl p-3 relative group">
                        <button class="absolute top-2 right-2 text-red-500">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.958a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.368 2.446a1 1 0 00-.363 1.118l1.287 3.957c.3.922-.755 1.688-1.538 1.118l-3.367-2.445a1 1 0 00-1.176 0l-3.367 2.445c-.783.57-1.838-.196-1.538-1.118l1.287-3.957a1 1 0 00-.363-1.118L2.063 9.385c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.951-.69l1.286-3.958z" />
                            </svg>
                        </button>
                        <div class="w-full h-24 bg-gray-100 rounded-lg mb-2"></div>
                        <p class="text-xs font-semibold text-gray-800 truncate">Desk Lamp</p>
                        <p class="text-indigo-600 text-xs font-bold">$18.00</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow p-6 sm:p-8 mt-8 mb-10">
                <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Account Activity
                </h2>
                <div class="space-y-4">
                    {{-- @forelse(auth()->user()->loginActivities as $activity) --}}
                    <div class="flex items-center gap-4 border-b border-gray-50 pb-4 last:border-0 last:pb-0">
                        <div class="w-10 h-10 bg-green-50 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800 text-sm">Successful login</p>
                            <p class="text-gray-400 text-xs">Cairo, Egypt · Chrome on Windows</p>
                        </div>
                        <span class="text-gray-300 text-xs">2 hours ago</span>
                    </div>
                    <div class="flex items-center gap-4 border-b border-gray-50 pb-4 last:border-0 last:pb-0">
                        <div
                            class="w-10 h-10 bg-indigo-50 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800 text-sm">Password changed</p>
                            <p class="text-gray-400 text-xs">Minya, Egypt · Chrome on Windows</p>
                        </div>
                        <span class="text-gray-300 text-xs">3 days ago</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-red-50 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800 text-sm">Failed login attempt</p>
                            <p class="text-gray-400 text-xs">Unknown location · Firefox on Linux</p>
                        </div>
                        <span class="text-gray-300 text-xs">1 week ago</span>
                    </div>
                    {{-- @empty
                    <p class="text-gray-400 text-center py-6">No recent activity</p>
                    @endforelse --}}
                </div>
            </div>

            <!-- Update Profile Form -->
            <div class="bg-white rounded-2xl shadow p-6 sm:p-8 mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">
                    Update Profile
                </h2>
                <form action="{{ route('edit_profile') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="block mb-2 text-sm font-semibold text-gray-700">
                                Name
                            </label>
                            <input type="text" value="{{ auth()->user()->name }}" name="name"
                                class="w-full rounded-xl px-4 py-3 text-gray-800 focus:outline-none"
                                placeholder="your name">
                            @error('name')
                                <span class="text-sm text-red-500 mt-1.5 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-semibold text-gray-700">
                                Email
                            </label>
                            <input type="email" value="{{ auth()->user()->email }}" name="email"
                                class="w-full rounded-xl px-4 py-3 text-gray-800 focus:outline-none"
                                placeholder="example@gmail.com">
                            @error('email')
                                <span class="text-sm text-red-500 mt-1.5 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">
                            Phone
                        </label>
                        <input type="number" value="{{ auth()->user()->phone }}" name="phone"
                            class="w-full rounded-xl px-4 py-3 text-gray-800 focus:outline-none"
                            placeholder="01032436552">
                        @error('phone')
                            <span class="text-sm text-red-500 mt-1.5 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 active:scale-[0.98] text-white font-semibold px-8 py-3.5 rounded-xl transition-all duration-200 shadow-lg shadow-indigo-200">
                        Save Changes
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
