@extends('Roles.admin')

@section('sellers-title')
    <h1 class="text-3xl font-bold text-gray-900">Sellers manegment</h1>
@endsection

@section('sellers-description')
    <p class="text-gray-500 mt-1">Manage registered Sellers and their roles</p>
@endsection

@section('sellers-content')
    @session('success')
        <div class="w-full bg-green-50 border border-green-200 p-3 mb-6 rounded-xl flex items-center gap-2">
            <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span class="text-green-700 text-sm font-medium">{{ session('success') }}</span>
        </div>
    @endsession

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="px-6 py-4 text-xs font-semibold text-gray-800 uppercase tracking-wider fw-bolder ">Seller
                        </th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-800 uppercase tracking-wider fw-bolder ">Email
                        </th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-800 uppercase tracking-wider fw-bolder ">Phone
                        </th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-800 uppercase tracking-wider fw-bolder ">
                            Current Role</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-800 uppercase tracking-wider fw-bolder ">
                            Joined</th>
                        <th
                            class="px-6 py-4 text-xs font-semibold text-red-900 uppercase tracking-wider fw-bolder  text-right">
                            Delete</th>
                        <th
                            class="px-6 py-4 text-xs font-semibold text-gray-800 uppercase tracking-wider fw-bolder  text-right">
                            Update Role</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($sellers as $seller)
                        <tr class="hover:bg-gray-50/60 transition-colors border-b-2 border-[#c9b1b1]">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    {{-- <div class="w-9 h-9 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-semibold text-sm shrink-0">  
                                    </div> --}}
                                    <img src="https://ui-avatars.com/api/?name={{ $seller->name }}&background=4f46e5&color=fff"
                                        class="rounded-full shadow-lg mt-2"
                                        style="width: 40px !important;height: 40px !important;">
                                    <span class="font-medium text-gray-800">{{ $seller->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600 text-sm">{{ $seller->email }}</td>
                            <td class="px-6 py-4 text-gray-600 text-sm">{{ $seller->phone }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-700">
                                    {{ $seller->role }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-500 text-sm">
                                <span class="whitespace-nowrap">{{ $seller->created_at->format('Y-m-d') }}</span>
                            </td>
                            <td class="px-6 py-4 text-gray-500 text-sm">
                                <form action="{{ route('user-destroy', $seller->id) }}" method="POST">
                                    @csrf
                                    <button
                                        class="text-red-500 hover:text-red-700 border border-red-500 py-1 px-3 rounded-lg">
                                        Delete
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('update-user-role', $seller->id) }}" method="POST">
                                    @csrf
                                    <div class="flex items-center justify-end gap-2">
                                        <select class="rounded-lg px-3 py-2 text-sm text-gray-700 bg-gray-100"
                                            name="role">
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                            <option value="seller">Seller</option>
                                        </select>
                                        <button
                                            class="bg-blue-500 text-white text-sm font-semibold px-4 py-2 rounded-lg cursor-pointer">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection