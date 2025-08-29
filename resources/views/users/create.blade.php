@extends('layouts.app')
@section('title','Tambah User')

@section('content')
<h1 class="text-2xl font-bold mb-6">Tambah User</h1>

<form action="{{ route('users.store') }}" method="POST" class="space-y-4 max-w-lg bg-white p-6 rounded shadow">
    @csrf
    <div>
        <label class="block text-sm font-medium">Nama</label>
        <input type="text" name="name" value="{{ old('name') }}"
               class="border w-full px-3 py-2 rounded shadow-sm @error('name') border-red-500 @enderror" required>
        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Email</label>
        <input type="email" name="email" value="{{ old('email') }}"
               class="border w-full px-3 py-2 rounded shadow-sm @error('email') border-red-500 @enderror" required>
        @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <div class="relative">
            <input id="password" type="password" name="password" 
                class="border w-full px-3 py-2 rounded shadow-sm" required>
            <!-- Tombol Toggle -->
            <button type="button" onclick="togglePassword()" 
                class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-600">
                👁
            </button>
        </div>
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
        <div class="relative">
            <input id="password_confirmation" type="password" name="password_confirmation" 
                class="border w-full px-3 py-2 rounded shadow-sm" required>
            <!-- Tombol Toggle -->
            <button type="button" onclick="togglePassword('password_confirmation')" 
                class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-600">
                👁
            </button>
        </div>
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

<script>
function togglePassword(id = 'password') {
    const input = document.getElementById(id);
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>
@endsection
