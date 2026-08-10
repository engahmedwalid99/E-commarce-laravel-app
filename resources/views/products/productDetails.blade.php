<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data->name }} - Product details</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        select,
        input {
            border: 1.5px solid #e2e8f0 !important;
            transition: all 0.2s ease-in-out;
        }

        select:focus,
        input:focus {
            border-color: #4f46e5 !important;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15);
            outline: none;
        }

        .qty-btn {
            transition: background-color 0.15s ease-in-out;
        }

        .fade-in {
            animation: fadeIn 0.4s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="min-h-screen bg-gray-50 p-6 sm:p-10">
        <div class="max-w-5xl mx-auto fade-in">

            <a href="{{ url()->previous() }}"
                class="inline-flex items-center gap-2 text-gray-500 hover:text-indigo-600 text-sm font-medium mb-6 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Back to products
            </a>

            @session('success')
                <div class="w-full bg-green-50 border border-green-200 p-3 mb-6 rounded-xl flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-green-700 text-sm font-medium">{{ session('success') }}</span>
                </div>
            @endsession

            <div class="bg-white rounded-2xl shadow-lg shadow-gray-200/60 overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-0">

                    <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 p-8 flex items-center justify-center">
                        <img src="{{ $data->image ?? 'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f' }}"
                            alt="{{ $data->name }}"
                            class="w-full h-80 md:h-96 object-cover rounded-xl shadow-md">
                    </div>

                    <div class="p-8 flex flex-col">
                        <span
                            class="inline-block w-fit text-xs font-semibold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full mb-4">
                            {{ $data->category ?? 'Product' }}
                        </span>

                        <h1 class="text-3xl font-bold text-gray-900 mb-3">{{ $data->name }}</h1>

                        <div class="flex items-center gap-3 mb-6">
                            <span class="text-3xl font-bold text-indigo-600">{{ $data->price }} EGP</span>
                            @if(isset($data->stock))
                                <span
                                    class="text-xs font-medium {{ $data->stock > 0 ? 'text-green-600 bg-green-50' : 'text-red-600 bg-red-50' }} px-3 py-1 rounded-full">
                                    {{ $data->stock > 0 ? 'In stock' : 'Out of stock' }}
                                </span>
                            @endif
                        </div>

                        <p class="text-gray-600 leading-relaxed mb-8">
                            {{ $data->description }}
                        </p>

                        <form action="" method="POST" class="mt-auto space-y-5">
                            @csrf

                            <div class="flex items-center gap-3">
                                <label for="quantity" class="text-sm font-medium text-gray-700">Quantity</label>
                                <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden">
                                    <button type="button" onclick="stepQty(-1)"
                                        class="qty-btn w-9 h-9 flex items-center justify-center text-gray-500 hover:bg-gray-100">−</button>
                                    <input type="number" id="quantity" name="quantity" value="1" min="1"
                                        class="w-14 h-9 text-center border-0! focus:ring-0! outline-none text-sm font-medium">
                                    <button type="button" onclick="stepQty(1)"
                                        class="qty-btn w-9 h-9 flex items-center justify-center text-gray-500 hover:bg-gray-100">+</button>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white font-semibold py-3 rounded-xl shadow-lg shadow-indigo-600/20 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m-10-4l1.6-8M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6" />
                                </svg>
                                Add to cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function stepQty(delta) {
            const input = document.getElementById('quantity');
            const newVal = Math.max(1, parseInt(input.value || '1', 10) + delta);
            input.value = newVal;
        }
    </script>
</body>

</html>