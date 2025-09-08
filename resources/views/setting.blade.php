@extends('layouts.app')
@section('title','Pengaturan')

@section('content')
<h1 class="text-2xl font-bold mb-4">Pengaturan Halaman User</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('setting.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block font-semibold">Judul Halaman:</label>
        <input type="text" name="landing_title" value="{{ $settings['landing_title'] ?? '' }}"
               class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Deskripsi Halaman:</label>
        <textarea name="landing_description" class="w-full border rounded p-2">{{ $settings['landing_description'] ?? '' }}</textarea>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection

