<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-50 h-screen">
    <div class="h-screen flex overflow-hidden">
        <div class="hidden lg:flex lg:w-1/2 gradient-panel relative overflow-hidden h-screen items-center justify-center p-12">
            <div class="absolute top-0 left-0 w-72 h-72 bg-white/10 rounded-full -translate-x-1/3 -translate-y-1/3"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full translate-x-1/3 translate-y-1/3"></div>

            <div class="relative z-10 text-white max-w-md">
                <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-8 backdrop-blur-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <h1 class="text-4xl font-bold mb-4 leading-tight">Join us and get started today</h1>
                <p class="text-white/80 text-lg leading-relaxed">Create your free account in seconds and unlock all the features waiting for you.</p>

                <div class="mt-10 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        <span class="text-white/90">Secure and encrypted data</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        <span class="text-white/90">Fast and easy setup</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        <span class="text-white/90">24/7 customer support</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/2 flex items-start justify-center p-6 sm:p-12 h-screen overflow-y-auto">
            <div class="w-full max-w-md fade-in">

                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Create Account</h2>
                    <p class="text-gray-500">Fill in your details to get started</p>
                </div>

                <form action="{{ route('create_account') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Name</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="w-full rounded-xl pl-11 pr-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none"
                                placeholder="User name">
                        </div>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <input type="text" name="email" value="{{ old('email') }}"
                                class="w-full rounded-xl pl-11 pr-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none"
                                placeholder="example@gmail.com">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Phone</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </span>
                            <input type="number" name="phone" value="{{ old('phone') }}"
                                class="w-full rounded-xl pl-11 pr-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none"
                                placeholder="01032237663">
                        </div>
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <label class="block mb-2 text-sm font-semibold text-gray-700">Account Type</label>
                    <div class="relative">
                        <select name="role" class="w-full appearance-none rounded-xl pl-4 pr-10 py-3 text-gray-800 bg-white border border-gray-200">
                            <option value="" disabled selected>Select account type</option>
                            <option value="user">User</option>
                            <option value="seller">Seller</option>
                        </select>
                        @error('role')
                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
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

                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Confirm Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input type="password" name="password_confirmation"
                                class="w-full rounded-xl pl-11 pr-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none"
                                placeholder="************">
                        </div>
                    </div>
                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 active:scale-[0.98] text-white font-semibold py-3.5 rounded-xl transition-all duration-200 shadow-lg shadow-indigo-200">
                        Create Account
                    </button>
                </form>
                <p class="text-center mt-8 mb-8 text-gray-500">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-indigo-600 font-semibold hover:text-indigo-700">
                        Login
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>