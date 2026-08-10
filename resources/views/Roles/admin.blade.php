<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        select,
        input {
            border: 1.5px solid #334155 !important;
            transition: all 0.2s ease-in-out;
        }

        select:focus,
        input:focus {
            border-color: #06b6d4 !important;
            box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.15);
            outline: none;
        }

        .nav-item {
            position: relative;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out;
        }

        .nav-item::before {
            content: "";
            position: absolute;
            left: 0;
            top: 6px;
            bottom: 6px;
            width: 3px;
            border-radius: 0 3px 3px 0;
            background: #22d3ee;
            transform: scaleY(0);
            transition: transform 0.18s ease-in-out;
        }

        .nav-item.active::before,
        .nav-item:hover::before {
            transform: scaleY(1);
        }

        .pulse-dot {
            box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.6);
            animation: pulse-ring 2s infinite;
        }

        @keyframes pulse-ring {
            0% {
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.5);
            }

            70% {
                box-shadow: 0 0 0 6px rgba(34, 197, 94, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0);
            }
        }

        #loading-overlay {
            transition: opacity 0.25s ease-in-out;
        }
    </style>
</head>

<body class="bg-slate-100">
    <div class="min-h-screen flex flex-col lg:flex-row">

        {{-- Sidebar --}}
        <aside class="w-full lg:w-64 shrink-0 bg-slate-950 lg:min-h-screen flex flex-col">
            <div class="px-6 py-6 flex items-center gap-3 border-b border-slate-800">
                <span class="w-9 h-9 rounded-lg bg-cyan-500 flex items-center justify-center text-slate-950 font-bold">
                    {{ auth()->user()->name[0] }}
                </span>
                <div>
                    <p class="text-white font-semibold leading-none">{{ auth()->user()->name }}</p>
                    <p class="text-[11px] font-mono text-slate-500 mt-1 tracking-wide">
                        {{ substr(auth()->user()->email, 0, 25) }}</p>
                </div>
            </div>

            <nav class="flex-1 py-4 overflow-y-auto">
                <p class="px-6 pt-2 pb-2 text-[11px] font-mono text-slate-600 tracking-wide">GENERAL</p>

                <a href="{{ route('home') }}"
                    class="nav-item flex items-center gap-3 px-6 py-2.5 text-slate-300 hover:text-white hover:bg-slate-800/60">
                    <svg class="w-5 h-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                    </svg>
                    <span class="text-sm font-medium">Home</span>
                </a>
                
                <a href="{{ route('profile') }}"
                    class="nav-item flex items-center gap-3 px-6 py-2.5 text-slate-300 hover:text-white hover:bg-slate-800/60">
                    <svg class="w-5 h-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    <span class="text-sm font-medium">Profile</span>
                </a>

                <a href="{{ route('users') }}"
                    class="nav-item flex items-center gap-3 px-6 py-2.5 text-slate-300 hover:text-white hover:bg-slate-800/60">
                    <svg class="w-5 h-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87m8-6.13a3 3 0 100-6 3 3 0 000 6zM9 14a3 3 0 100-6 3 3 0 000 6zm3 7v-2a4 4 0 00-8 0v2m8 0h8" />
                    </svg>
                    <span class="text-sm font-medium">Users</span>
                </a>

                <a href="{{ route('sellers') }}"
                    class="nav-item flex items-center gap-3 px-6 py-2.5 text-slate-300 hover:text-white hover:bg-slate-800/60">
                    <svg class="w-5 h-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 9l1-5h16l1 5M5 9v10h14V9M9 19V13h6v6" />
                    </svg>
                    <span class="text-sm font-medium">Sellers</span>
                </a>

                @if (Auth::user()->email == env('OWNER'))
                    <a href="{{ route('addAdmin') }}"
                        class="nav-item flex items-center gap-3 px-6 py-2.5 text-slate-300 hover:text-white hover:bg-slate-800/60">
                        <svg class="w-5 h-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span class="text-sm font-medium">Add Admin</span>
                    </a>
                @endif
            </nav>

            <div class="px-6 py-4 border-t border-slate-800 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-green-500 pulse-dot"></span>
                <p class="text-[11px] font-mono text-slate-500 tracking-wide">ALL SYSTEMS OPERATIONAL</p>
            </div>
        </aside>

        <main class="flex-1 min-w-0">
            <div
                class="bg-white border-b border-slate-200 px-6 sm:px-10 py-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>

                    {{-- Sellers --}}

                    @yield('admin-titlt')
                    @yield('admin-description')

                    {{-- Sellers --}}

                    @yield('sellers-title')
                    @yield('sellers-description')
                </div>
                <div class="w-full sm:w-72">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input type="text"
                            class="w-full rounded-xl pl-11 pr-4 py-2.5 bg-slate-50 text-slate-800 placeholder-slate-400 text-sm"
                            placeholder="Search by name or email">
                    </div>
                </div>
            </div>

            <div class="px-6 sm:px-10 py-8">

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
                        <p class="text-[11px] font-mono text-slate-400 tracking-wide mb-2">TOTAL USERS</p>
                        <p class="text-2xl font-bold text-slate-900">{{ \App\Models\User::count() ?? '—' }}</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
                        <p class="text-[11px] font-mono text-slate-400 tracking-wide mb-2">ACTIVE SELLERS</p>
                        <p class="text-2xl font-bold text-slate-900">
                            {{ \App\Models\User::where('role', 'seller')->count() ?? '—' }}</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
                        <p class="text-[11px] font-mono text-slate-400 tracking-wide mb-2">ORDERS TODAY</p>
                        <p class="text-2xl font-bold text-slate-900">{{ $ordersCount ?? '—' }}</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
                        <p class="text-[11px] font-mono text-slate-400 tracking-wide mb-2">ADMINS</p>
                        <p class="text-2xl font-bold text-slate-900">
                            {{ \App\Models\User::where('role', 'admin')->count() ?? '—' }}</p>
                    </div>
                </div>

                <div id="loading-overlay" class="flex items-center justify-center py-16">
                    <span class="text-slate-400 text-sm font-medium animate-pulse">Loading users...</span>
                </div>
                <div id="content-area" class="hidden">
                    @yield('users-content')
                    @yield('sellers-content')
                    @yield('add-admin-content')
                </div>
            </div>
        </main>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            document.getElementById('loading-overlay').classList.add('hidden');
            document.getElementById('content-area').classList.remove('hidden');
        });
    </script>
</body>

</html>
