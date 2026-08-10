<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller - dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@500&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        .font-display {
            font-family: 'Fraunces', serif;
            font-optical-sizing: auto;
        }

        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        select,
        input {
            border: 1.5px solid #e7e5e4 !important;
            transition: all 0.2s ease-in-out;
        }

        select:focus,
        input:focus {
            border-color: #ca8a04 !important;
            box-shadow: 0 0 0 4px rgba(202, 138, 4, 0.12);
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
            top: 8px;
            bottom: 8px;
            width: 2px;
            background: #eab308;
            transform: scaleY(0);
            transition: transform 0.18s ease-in-out;
        }

        .nav-item.active::before,
        .nav-item:hover::before {
            transform: scaleY(1);
        }

        #loading-overlay {
            transition: opacity 0.25s ease-in-out;
        }
    </style>
</head>

<body class="bg-stone-50">
    <div class="min-h-screen flex flex-col lg:flex-row">

        {{-- Sidebar --}}
        <aside class="w-full lg:w-64 shrink-0 bg-stone-900 lg:min-h-screen flex flex-col">
            <div class="px-6 py-7 flex items-center gap-3 border-b border-stone-800">
                <span
                    class="w-9 h-9 rounded-full bg-yellow-600 flex items-center justify-center font-display text-stone-900 font-semibold">
                    S
                </span>
                <div>
                    <p class="font-display text-lg text-white leading-none">Seller<span class="text-yellow-500">.</span>
                    </p>
                    <p class="text-[11px] font-mono text-stone-500 mt-1 tracking-wide">DASHBOARD</p>
                </div>
            </div>

            <nav class="flex-1 py-4">
                <a href="{{ route('profile') }}"
                    class="nav-item flex items-center gap-3 px-6 py-3 text-stone-300 hover:text-white hover:bg-stone-800/60">
                    <svg class="w-5 h-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    <span class="text-sm font-medium">Profile</span>
                </a>

                <a href="{{ route('show_add_product_form') }}"
                    class="nav-item active flex items-center gap-3 px-6 py-3 text-white bg-stone-800/60">
                    <svg class="w-5 h-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span class="text-sm font-medium">Add product</span>
                </a>

                <a href=""
                    class="nav-item flex items-center gap-3 px-6 py-3 text-stone-300 hover:text-white hover:bg-stone-800/60">
                    <svg class="w-5 h-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="text-sm font-medium">Settings</span>
                </a>
            </nav>

            <div class="px-6 py-5 border-t border-stone-800">
                <p class="text-[11px] font-mono text-stone-500 tracking-wide">v1.0 — SELLER PORTAL</p>
            </div>
        </aside>

        {{-- Main content --}}
        <main class="flex-1 px-6 sm:px-10 py-10">
            <div class="max-w-4xl mx-auto">

                <div class="mb-8">
                    @yield('add-product-title')
                    @yield('add-product-description')
                </div>

                @session('success')
                    <div class="w-full bg-yellow-50 border border-yellow-200 p-3 mb-6 rounded-lg flex items-center gap-2">
                        <svg class="w-5 h-5 text-yellow-600 shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-yellow-800 text-sm font-medium">{{ session('success') }}</span>
                    </div>
                @endsession

                @yield('product_form')
            </div>
        </main>
    </div>
</body>

</html>