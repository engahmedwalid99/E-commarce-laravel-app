<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        input {
            border: 1.5px solid #e2e8f0 !important;
            transition: all 0.25s ease-in-out;
        }

        input:focus {
            border-color: #4f46e5 !important;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15);
        }

        .gradient-panel {
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
    </style>
</head>

<body class="bg-gray-50 h-screen overflow-hidden">
    <div class="h-screen flex">

        <div
            class="hidden lg:flex lg:w-1/2 gradient-panel relative overflow-hidden h-screen items-center justify-center p-12">
            <div class="absolute top-0 left-0 w-72 h-72 bg-white/10 rounded-full -translate-x-1/3 -translate-y-1/3">
            </div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full translate-x-1/3 translate-y-1/3">
            </div>

            <div class="relative z-10 text-white max-w-md">
                <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-8 backdrop-blur-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h1 class="text-4xl font-bold mb-4 leading-tight">Welcome back, we missed you</h1>
                <p class="text-white/80 text-lg leading-relaxed">Log in to pick up right where you left off and access
                    your dashboard.</p>

                <div class="mt-10 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-white/90">Secure and encrypted login</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-white/90">One-click social sign in</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-white/90">24/7 customer support</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 h-screen overflow-y-auto">
            <div class="w-full max-w-md fade-in">

                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Login</h2>
                    <p class="text-gray-500">Enter your credentials to access your account</p>
                </div>
                @session('error')
                    <div class="w-full bg-red-50 border border-red-200 p-3 mb-5 rounded-xl flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-red-600 text-sm font-medium">{{ session('error') }}</span>
                    </div>
                @endsession

                <form action="{{ route('logged_in') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Email</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </span>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="w-full rounded-xl pl-11 pr-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none"
                                    placeholder="email">
                            </div>
                            @error('email')
                                <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Password</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </span>
                                <input type="password" name="password"
                                    class="w-full rounded-xl pl-11 pr-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none"
                                    placeholder="************">
                            </div>
                            @error('password')
                                <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                            <input type="checkbox" name="remember"
                                class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            Remember Me
                        </label>
                        <a href="{{ route('forget_password') }}"
                            class="text-indigo-600 text-sm font-medium hover:text-indigo-700">
                            Forgot Password?
                        </a>
                    </div>
                    @error('remember')
                        <span class="text-red-700">{{ $message }}</span>
                    @enderror
                    {{-- ===================== reCHAPTCHA ========================= --}}
                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    {{-- ===================== reCHAPTCHA ========================= --}}
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 active:scale-[0.98] text-white font-semibold py-3.5 rounded-xl transition-all duration-200 shadow-lg shadow-indigo-200">
                        Login
                    </button>
                </form>
                <div class="relative my-7">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="bg-gray-50 px-4 text-gray-400 text-sm">
                            Or continue with
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    <a href="{{ Route('social.redirect', 'google') }}"
                        class="flex items-center justify-center border border-gray-200 rounded-xl py-3 bg-white hover:bg-gray-50 hover:border-gray-300 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                            <path fill="#FFC107"
                                d="M43.6 20.5H42V20H24v8h11.3C33.7 32.7 29.3 36 24 36c-6.6 0-12-5.4-12-12S17.4 12 24 12c3 0 5.8 1.1 7.9 3l5.7-5.7C34.1 6.1 29.3 4 24 4 12.9 4 4 12.9 4 24s8.9 20 20 20 20-8.9 20-20c0-1.3-.1-2.3-.4-3.5z" />
                            <path fill="#FF3D00"
                                d="M6.3 14.7l6.6 4.8C14.7 15.5 19 12 24 12c3 0 5.8 1.1 7.9 3l5.7-5.7C34.1 6.1 29.3 4 24 4 16.3 4 9.7 8.3 6.3 14.7z" />
                            <path fill="#4CAF50"
                                d="M24 44c5.2 0 10-2 13.6-5.2l-6.3-5.2C29.3 35.3 26.8 36 24 36c-5.3 0-9.7-3.3-11.3-8l-6.6 5.1C9.5 39.6 16.2 44 24 44z" />
                            <path fill="#1976D2"
                                d="M43.6 20.5H42V20H24v8h11.3c-1.1 3-3.4 5.4-6.6 6.9l6.3 5.2C39.5 36.2 44 30.7 44 24c0-1.3-.1-2.3-.4-3.5z" />
                        </svg>
                    </a>
                    <a href="{{ route('social.redirect', 'github') }}"
                        class="flex items-center justify-center border border-gray-200 rounded-xl py-3 bg-white hover:bg-gray-50 hover:border-gray-300 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"
                            class="w-5 h-5 fill-current text-gray-800">
                            <path
                                d="M165.9 397.4c0 2-2.3 3.7-5.2 3.7-3 0-5.2-1.7-5.2-3.7 0-2.1 2.3-3.7 5.2-3.7 2.9-.1 5.2 1.6 5.2 3.7zm-31.1-4.5c-.7 2 .8 4.3 3.4 5.2 2.5.9 5.2 0 5.9-2 .7-2-.8-4.3-3.3-5.2-2.6-.9-5.2 0-6 2zm44.2-1.7c-2.9.8-4.8 3-4.1 5 .7 2 3.7 3 6.6 2.2 2.9-.8 4.8-3 4.1-5-.7-2-3.7-3-6.6-2.2zM248 8C111 8 0 119 0 256c0 109.8 71.3 202.9 170.3 235.8 12.4 2.3 17-5.4 17-12v-42.2c-69.3 15.1-83.9-29.4-83.9-29.4-11.3-28.7-27.6-36.3-27.6-36.3-22.6-15.5 1.7-15.2 1.7-15.2 25 1.8 38.1 25.7 38.1 25.7 22.2 38.1 58.3 27.1 72.5 20.7 2.2-16.1 8.7-27.1 15.8-33.3-55.3-6.3-113.5-27.6-113.5-122.8 0-27.1 9.7-49.3 25.6-66.7-2.6-6.3-11.1-31.7 2.4-66.1 0 0 20.9-6.7 68.4 25.5 19.8-5.5 41-8.3 62.1-8.4 21.1.1 42.3 2.9 62.1 8.4 47.5-32.2 68.4-25.5 68.4-25.5 13.5 34.4 5 59.8 2.4 66.1 15.9 17.4 25.6 39.6 25.6 66.7 0 95.5-58.3 116.4-113.8 122.6 8.9 7.7 16.8 22.9 16.8 46.1v68.3c0 6.7 4.6 14.4 17.1 12C424.7 458.9 496 365.8 496 256 496 119 385 8 248 8z" />
                        </svg>
                    </a>
                    <a href="{{ Route('social.redirect', 'facebook') }}"
                        class="flex items-center justify-center border border-gray-200 rounded-xl py-3 bg-white hover:bg-gray-50 hover:border-gray-300 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                            class="w-5 h-5 fill-current text-blue-600">
                            <path
                                d="M279.1 288l14.2-92.7h-88.9v-60.1c0-25.4 12.5-50.2 52.4-50.2H297V6.3S260.7 0 226.4 0C154.3 0 107.3 43.7 107.3 122.7v72.6H22.9V288h84.4v224h97.2V288z" />
                        </svg>
                    </a>
                </div>
                <p class="text-center mt-8 text-gray-500">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-indigo-600 font-semibold hover:text-indigo-700">
                        Register
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>