@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Akun</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="max-w-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                   class="border p-2 w-full">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                   class="border p-2 w-full">
        </div>

        <div class="flex gap-2">
            <button type="submit"
                class="flex-1 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-center">
                Simpan
            </button>

            <a href="{{ route('users.index') }}"
            class="flex-1 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-center">
            Batal
            </a>
        </div>
    </form>
@endsection
 