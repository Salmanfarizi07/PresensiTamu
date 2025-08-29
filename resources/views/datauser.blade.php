@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-center md:text-left">Informasi Akun</h1>

<div class="max-w-lg mx-auto bg-white rounded-xl shadow-lg overflow-hidden md:mx-0">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-4">
        <h2 class="text-lg font-semibold">Detail Akun</h2>
    </div>

    <!-- Body Card -->
    <div class="overflow-x-auto px-4 sm:px-6 py-4">
        <table class="min-w-full table-auto">
            <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <th class="px-4 py-2 text-left font-medium text-gray-700">ID</th>
                    <td class="px-4 py-2">{{ Auth::user()->id }}</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <th class="px-4 py-2 text-left font-medium text-gray-700">Nama</th>
                    <td class="px-4 py-2">{{ Auth::user()->name }}</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <th class="px-4 py-2 text-left font-medium text-gray-700">Email</th>
                    <td class="px-4 py-2 break-all">{{ Auth::user()->email }}</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <th class="px-4 py-2 text-left font-medium text-gray-700">Dibuat</th>
                    <td class="px-4 py-2">
                        {{ Auth::user()->created_at ? Auth::user()->created_at->format('d M Y') : '-' }}
                    </td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <th class="px-4 py-2 text-left font-medium text-gray-700">Terakhir Update</th>
                    <td class="px-4 py-2">
                        {{ Auth::user()->updated_at ? Auth::user()->updated_at->format('d M Y') : '-' }}
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Tombol Edit -->
        <div class="mt-4 text-center md:text-right">
            <a href="{{ route('users.edit', Auth::user()->id) }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow inline-block">
                Edit Profil
            </a>
        </div>
    </div>
</div>
@endsection
