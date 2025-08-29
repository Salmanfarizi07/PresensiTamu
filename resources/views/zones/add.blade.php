@extends('layouts.app')
@section('title','Tambah Data Kartu Daerah')

@section('content')
<h1 class="text-2xl font-bold mb-6">Tambah Data Kartu Daerah</h1>

<a href="{{ route('zones') }}" class="bg-gray-500 text-white px-3 py-1 rounded inline-block mb-4">
    Kembali
</a>

<form action="{{ route('zones.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-lg">
    @csrf

    <!-- ID Kartu -->
    <div class="mb-4">
        <label class="block mb-1 font-semibold">ID Kartu</label>
        <input type="text" name="id_kartu" value="{{ old('id_kartu') }}" 
               class="w-full border px-3 py-2 rounded" required>
        @error('id_kartu')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Zona -->
    <div class="mb-4">
        <label class="block mb-1 font-semibold">Zona</label>
        <select name="zona" class="w-full border px-3 py-2 rounded" required>
            <option value="">-- Pilih Zona --</option>
            <option value="Terbatas" {{ old('zona') == 'Terbatas' ? 'selected' : '' }}>Zona Terbatas</option>
            <option value="Tertutup" {{ old('zona') == 'Tertutup' ? 'selected' : '' }}>Zona Tertutup</option>
            <option value="Terlarang" {{ old('zona') == 'Terlarang' ? 'selected' : '' }}>Zona Terlarang</option>
        </select>
        @error('zona')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Tombol Submit -->
    <div class="flex justify-end">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Tambah Data
        </button>
    </div>
</form>
@endsection
