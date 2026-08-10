<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Update Password</title>
    <style>
        body { font-family: 'Segoe UI', system-ui, -apple-system, sans-serif; }
        input {
            border: 1.5px solid #e2e8f0 !important;
            transition: all 0.25s ease-in-out;
        }
        input:focus {
            border-color: #4f46e5 !important;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15);
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
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-xl fade-in">
            <div class="bg-white shadow-xl rounded-2xl p-8 sm:p-10">

                <!-- Header -->
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Update Password</h2>
                        <p class="text-gray-500 text-sm">Keep your account secure with a strong password</p>
                    </div>
                </div>

                <form action="{{ route('confirem_update_password') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Current Password -->
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">
                            Current Password
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input
                                type="password"
                                name="current_password"
                                class="w-full rounded-xl pl-11 pr-4 py-3 text-gray-800 focus:outline-none"
                                placeholder="Enter current password"
                            >
                        </div>
                        @error('current_password')
                            <p class="text-red-500 text-sm mt-1.5">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="border-t border-gray-100 pt-5">
                        <!-- New Password -->
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">
                                New Password
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                    </svg>
                                </span>
                                <input
                                    type="password"
                                    name="password"
                                    class="w-full rounded-xl pl-11 pr-4 py-3 text-gray-800 focus:outline-none"
                                    placeholder="Enter new password"
                                >
                            </div>
                            @error('password')
                                <p class="text-red-500 text-sm mt-1.5">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label class="block mb-2 text-sm font-semibold text-gray-700">
                                Confirm New Password
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </span>
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="w-full rounded-xl pl-11 pr-4 py-3 text-gray-800 focus:outline-none"
                                    placeholder="Re-enter new password"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="bg-indigo-50 rounded-xl p-4 flex gap-3">
                        <svg class="w-5 h-5 text-indigo-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-sm text-indigo-700">
                            Use at least 8 characters with a mix of letters, numbers, and symbols.
                        </p>
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 active:scale-[0.98] text-white font-semibold py-3.5 rounded-xl transition-all duration-200 shadow-lg shadow-indigo-200">
                        Update Password
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>