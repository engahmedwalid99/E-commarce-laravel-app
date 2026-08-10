@extends('Roles.seller')

@section('add-product-title')
    <h1 class="text-3xl font-bold text-gray-900">Add Product</h1>
@endsection

@section('add-product-description')
    <p class="text-gray-500 mt-1">Add your products and sell all in one place</p>
@endsection

@section('product_form')
    <div class="max-w-3xl mx-auto mt-8 bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Add Product
        </h2>
        <form action="{{ route('save-product') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Product name
                </label>
                <input type="text" name="product_name" value=""
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    placeholder="Enter product name">

                @error('product_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Product description
                </label>
                <textarea name="product_description" cols="30" rows="10"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    placeholder="Enter product description"></textarea>
                @error('product_description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Price
                </label>
                <input type="number" name="price"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    placeholder="Enter product price">
                @error('price')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <input type="file" name="file" class="w-full p-2 rounded-xl border border-dashed border-gray-300">
            @error('file')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <div class="flex gap-4 pt-3">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg transition">
                    Add product
                </button>
                <a href="{{ route('seller-dashboard') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
