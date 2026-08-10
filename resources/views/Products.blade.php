```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Products | ShopZone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
        }
        .hero-gradient {
            background:
                radial-gradient(circle at 20% 20%, rgba(99, 102, 241, .35), transparent 30%),
                radial-gradient(circle at 80% 30%, rgba(168, 85, 247, .3), transparent 30%),
                linear-gradient(135deg, #111827, #1e1b4b, #312e81);
        }
        .glass {
            background: rgba(255, 255, 255, .08);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, .12);
        }
        .product-card {
            transition: transform .3s ease, box-shadow .3s ease;
        }
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(15, 23, 42, .13);
        }
        .product-image {
            transition: transform .45s ease;
        }
        .product-card:hover .product-image {
            transform: scale(1.07);
        }
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -7px;
            width: 0;
            height: 2px;
            border-radius: 999px;
            background: #6366f1;
            transition: width .3s ease;
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height .35s ease;
        }
        .mobile-menu.open {
            max-height: 500px;
        }
        .hamburger span {
            display: block;
            width: 25px;
            height: 2px;
            margin: 5px 0;
            background: #111827;
            transition: .3s;
        }
        .hamburger.open span:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }
        .hamburger.open span:nth-child(2) {
            opacity: 0;
        }
        .hamburger.open span:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }
        .fade-up {
            animation: fadeUp .7s ease forwards;
        }
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .badge {
            animation: pulseBadge 2s infinite;
        }
        @keyframes pulseBadge {
            0%,
            100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }
    </style>
</head>
<body>
    <header class="fixed top-0 left-0 w-full z-50 bg-white/95 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="h-20 flex items-center justify-between">
                <a href="{{ route('home') }}" class="text-3xl font-black tracking-tight">
                    <span class="text-indigo-600">Shop</span><span class="text-gray-900">Zone</span>
                </a>
                <nav class="hidden md:flex items-center gap-8 text-sm font-semibold">
                    <a href="{{ route('home') }}" class="nav-link text-gray-700 hover:text-indigo-600 transition">
                        Home
                    </a>
                    <a href="{{ route('products.index') }}" class="nav-link active text-indigo-600">
                        Products
                    </a>
                    <a href="{{ route('home') }}#categories"
                        class="nav-link text-gray-700 hover:text-indigo-600 transition">
                        Categories
                    </a>
                    <a href="{{ route('home') }}#contact"
                        class="nav-link text-gray-700 hover:text-indigo-600 transition">
                        Contact
                    </a>
                </nav>
                <div class="flex items-center gap-4">
                    <button
                        class="relative w-11 h-11 rounded-xl bg-gray-100 hover:bg-indigo-50 text-gray-700 hover:text-indigo-600 transition">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span
                            class="badge absolute -top-1 -right-1 w-5 h-5 rounded-full bg-red-500 text-white text-[10px] flex items-center justify-center font-bold">
                            3
                        </span>
                    </button>
                    @guest
                        <a href="{{ route('login') }}"
                            class="hidden sm:block px-5 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-600/20">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                            class="hidden lg:block text-sm font-semibold text-gray-700 hover:text-indigo-600 transition">
                            Register
                        </a>
                    @endguest
                    @auth
                        <a href="{{ route('profile') }}"
                            class="w-11 h-11 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center hover:bg-indigo-100 transition">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <a href="{{ route('logged_out') }}"
                            class="hidden sm:flex items-center gap-2 px-4 py-2.5 rounded-xl bg-red-50 text-red-600 text-sm font-bold hover:bg-red-100 transition">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </a>
                    @endauth
                    <button id="hamburgerBtn" onclick="toggleMobileMenu()" class="hamburger md:hidden">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobileMenu" class="mobile-menu md:hidden bg-white border-t border-gray-100">
            <nav class="max-w-7xl mx-auto px-5 py-5 flex flex-col gap-4">
                <a href="{{ route('home') }}" class="py-2 text-gray-700 hover:text-indigo-600">
                    Home
                </a>
                <a href="{{ route('products.index') }}" class="py-2 text-indigo-600 font-bold">
                    Products
                </a>
                <a href="{{ route('home') }}#categories" class="py-2 text-gray-700 hover:text-indigo-600">
                    Categories
                </a>
                <a href="{{ route('home') }}#contact" class="py-2 text-gray-700 hover:text-indigo-600">
                    Contact
                </a>
                @guest
                    <a href="{{ route('register') }}" class="py-2 text-gray-700">
                        Register
                    </a>
                    <a href="{{ route('login') }}" class="text-center bg-indigo-600 text-white py-3 rounded-xl font-bold">
                        Login
                    </a>
                @endguest
                @auth
                    <a href="{{ route('profile') }}" class="py-2 text-gray-700">
                        My Profile
                    </a>
                    <a href="{{ route('logged_out') }}"
                        class="text-center bg-red-600 text-white py-3 rounded-xl font-bold">
                        Logout
                    </a>
                @endauth
            </nav>
        </div>
    </header>
    <section class="hero-gradient pt-32 pb-20 text-white">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="max-w-3xl fade-up">
                <div class="inline-flex items-center gap-2 glass px-4 py-2 rounded-full text-sm font-semibold mb-6">
                    <i class="fa-solid fa-store text-indigo-300"></i>
                    ShopZone Store
                </div>
                <h1 class="text-4xl md:text-6xl font-black leading-tight">
                    Discover Products
                    <span class="text-indigo-300">You'll Love.</span>
                </h1>
                <p class="mt-6 text-lg md:text-xl text-indigo-100 max-w-2xl leading-relaxed">
                    Explore our collection of carefully selected products,
                    designed to give you quality, value and a better shopping
                    experience.
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#products"
                        class="inline-flex items-center gap-2 bg-white text-indigo-700 px-6 py-3.5 rounded-xl font-bold hover:bg-indigo-50 transition">
                        Browse Products
                        <i class="fa-solid fa-arrow-down"></i>
                    </a>
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-2 glass px-6 py-3.5 rounded-xl font-bold hover:bg-white/15 transition">
                        <i class="fa-solid fa-house"></i>
                        Back Home
                    </a>
                </div>
            </div>
        </div>
    </section>
    <main id="products" class="py-16">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            @if (isset($products) && count($products))
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5 mb-10">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">
                            Our Collection
                        </p>
                        <h2 class="text-3xl font-black text-gray-900 mt-1">
                            All Products
                        </h2>
                        <p class="text-gray-500 mt-2">
                            Showing
                            <span class="font-bold text-gray-900">
                                {{ $products->count() }}
                            </span>
                            product{{ $products->count() === 1 ? '' : 's' }}
                        </p>
                    </div>
                    <div class="flex items-center gap-3">
                        <label class="text-sm font-semibold text-gray-600">
                            Sort by
                        </label>
                        <select onchange="window.location.href=this.value"
                            class="border border-gray-200 bg-white px-4 py-3 rounded-xl text-sm font-semibold text-gray-700 outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'latest']) }}">
                                Newest
                            </option>
                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}">
                                Price: Low to High
                            </option>
                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}">
                                Price: High to Low
                            </option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-7">
                    @foreach ($products as $product)
                        <article
                            class="product-card bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm">
                            <div class="relative overflow-hidden bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f"
                                    alt="{{ $product->name }}" class="product-image w-full h-56 object-cover">
                                <div
                                    class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm px-3 py-1.5 rounded-full text-xs font-bold text-indigo-600 shadow">
                                    <i class="fa-solid fa-star mr-1"></i>
                                    Featured
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="flex items-start justify-between gap-3">
                                    <h3 class="text-lg font-extrabold text-gray-900 line-clamp-1">
                                        {{ $product->name }}
                                    </h3>
                                </div>
                                <p class="text-sm text-gray-500 mt-2 leading-relaxed min-h-[42px]">
                                    {{ \Illuminate\Support\Str::limit($product->description, 70) }}
                                </p>
                                <div class="flex items-center justify-between mt-5">
                                    <div>
                                        <p class="text-xs text-gray-400 font-semibold">
                                            Price
                                        </p>
                                        <p class="text-2xl font-black text-indigo-600">
                                            ${{ number_format($product->price, 2) }}
                                        </p>
                                    </div>
                                    <div
                                        class="w-10 h-10 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>
                                <form action="{{ route('product-details', $product->id) }}" method="POST"
                                    class="mt-5">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex items-center justify-center gap-2 bg-gray-900 text-white py-3 rounded-xl font-bold hover:bg-indigo-600 transition duration-300">
                                        View Details
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </form>
                            </div>
                        </article>
                    @endforeach
                </div>
                @if (method_exists($products, 'links'))
                    <div class="mt-14 flex justify-center">
                        {{ $products->links() }}
                    </div>
                @endif
            @else
                <div class="py-28 text-center">
                    <div
                        class="mx-auto w-24 h-24 rounded-3xl bg-indigo-50 text-indigo-500 flex items-center justify-center text-4xl">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <h2 class="text-3xl font-black text-gray-900 mt-7">
                        No Products Yet
                    </h2>
                    <p class="text-gray-500 mt-3 max-w-md mx-auto">
                        We don't have any products available right now.
                        Check back soon for new arrivals.
                    </p>
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-2 mt-7 bg-indigo-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-indigo-700 transition">
                        <i class="fa-solid fa-house"></i>
                        Back to Home
                    </a>

                </div>
            @endif
        </div>
    </main>
    <section class="bg-white border-y border-gray-100 py-14">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex items-center gap-4">
                    <div
                        class="w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-gray-900">
                            Fast Delivery
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Quick and reliable shipping.
                        </p>

                    </div>

                </div>


                <div class="flex items-center gap-4">

                    <div
                        class="w-14 h-14 rounded-2xl bg-green-50 text-green-600 flex items-center justify-center text-xl">

                        <i class="fa-solid fa-shield-halved"></i>

                    </div>

                    <div>

                        <h3 class="font-extrabold text-gray-900">
                            Secure Shopping
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Your data stays protected.
                        </p>

                    </div>

                </div>


                <div class="flex items-center gap-4">

                    <div
                        class="w-14 h-14 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl">

                        <i class="fa-solid fa-headset"></i>

                    </div>

                    <div>

                        <h3 class="font-extrabold text-gray-900">
                            Customer Support
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            We're here whenever you need us.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <footer id="contact" class="bg-gray-950 text-white">

        <div class="max-w-7xl mx-auto px-5 lg:px-8 py-16">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">

                <div>

                    <h3 class="text-2xl font-black">
                        <span class="text-indigo-400">Shop</span>Zone
                    </h3>

                    <p class="text-gray-400 leading-relaxed mt-5">

                        Your trusted online shopping destination.
                        Quality products, great prices and a seamless
                        shopping experience.

                    </p>

                </div>


                <div>

                    <h3 class="font-bold text-lg mb-5">
                        Quick Links
                    </h3>

                    <ul class="space-y-3 text-gray-400">

                        <li>
                            <a href="{{ route('home') }}" class="hover:text-white transition">
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('products.index') }}" class="hover:text-white transition">
                                Products
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('home') }}#categories" class="hover:text-white transition">
                                Categories
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('home') }}#contact" class="hover:text-white transition">
                                Contact
                            </a>
                        </li>

                    </ul>

                </div>


                <div>

                    <h3 class="font-bold text-lg mb-5">
                        Customer Service
                    </h3>

                    <ul class="space-y-3 text-gray-400">

                        <li>
                            <a href="{{ route('profile') }}" class="hover:text-white transition">
                                My Account
                            </a>
                        </li>

                        <li>
                            <a href="#" class="hover:text-white transition">
                                Shipping Policy
                            </a>
                        </li>

                        <li>
                            <a href="#" class="hover:text-white transition">
                                Privacy Policy
                            </a>
                        </li>

                    </ul>

                </div>


                <div>

                    <h3 class="font-bold text-lg mb-5">
                        Contact Us
                    </h3>

                    <div class="space-y-4 text-gray-400">

                        <p class="flex items-center gap-3">

                            <i class="fa-solid fa-location-dot text-indigo-400"></i>

                            Egypt, Cairo

                        </p>

                        <p class="flex items-center gap-3">

                            <i class="fa-solid fa-phone text-indigo-400"></i>

                            01105867583

                        </p>

                        <p class="flex items-center gap-3">

                            <i class="fa-solid fa-envelope text-indigo-400"></i>

                            support@shopzone.com

                        </p>

                    </div>

                </div>

            </div>

        </div>


        <div class="border-t border-gray-800">

            <div class="max-w-7xl mx-auto px-5 lg:px-8 py-6">

                <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-gray-500">

                    <p>
                        © {{ date('Y') }} ShopZone. All Rights Reserved.
                    </p>

                    <div class="flex items-center gap-5">

                        <a href="#" class="hover:text-white transition">
                            <i class="fa-brands fa-facebook"></i>
                        </a>

                        <a href="#" class="hover:text-white transition">
                            <i class="fa-brands fa-instagram"></i>
                        </a>

                        <a href="#" class="hover:text-white transition">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </footer>


    <script>
        function toggleMobileMenu() {

            const menu = document.getElementById('mobileMenu');
            const button = document.getElementById('hamburgerBtn');

            menu.classList.toggle('open');
            button.classList.toggle('open');

        }
    </script>

</body>

</html>