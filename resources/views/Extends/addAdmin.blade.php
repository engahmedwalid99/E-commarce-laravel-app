@extends('Roles.admin')

@section('admin-titlt')
    <h1 class="text-3xl font-bold text-gray-900">Add admin</h1>
@endsection

@section('admin-description')
    <p class="text-gray-500 mt-1">Admin can controle users in website</p>
@endsection

@section('add-admin-content')
<div class="max-w-3xl mx-auto mt-8 bg-white shadow-lg rounded-xl p-8">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Add New Admin
    </h2>

    <form action="" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">
                Full Name
            </label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                placeholder="Enter admin name">

            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">
                Email
            </label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                placeholder="Enter email">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">
                Phone
            </label>
            <input
                type="text"
                name="phone"
                value="{{ old('phone') }}"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                placeholder="Enter phone number">
            @error('phone')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">
                Password
            </label>
            <input
                type="password"
                name="password"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                placeholder="Enter password">
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <input type="hidden" name="role" value="admin">
        <div class="flex gap-4 pt-3">
            <button
                type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg transition">
                Add Admin
            </button>

            <a href="{{ route('admin-dashboard') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg transition">
                Cancel
            </a>
        </div>

    </form>

</div>
@endsection