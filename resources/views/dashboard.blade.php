@extends('layouts.app')
@section('title','Dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard Utama</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-blue-600 text-white p-6 rounded shadow text-center">
        <h2 class="font-semibold text-lg">Total Tamu</h2>
        <p class="text-3xl font-bold mt-2">{{ $totalTamu }}</p>
    </div>
    <div class="bg-green-600 text-white p-6 rounded shadow text-center">
        <h2 class="font-semibold text-lg">Tamu Hari Ini</h2>
        <p class="text-3xl font-bold mt-2">{{ $totalHariIni }}</p>
    </div>
    <div class="bg-yellow-500 text-white p-6 rounded shadow text-center">
        <h2 class="font-semibold text-lg">Pengunjung Terakhir</h2>
        <p class="text-xl mt-2">{{ $latestTamu ? $latestTamu->name : '-' }}</p>
    </div>
</div>
@endsection
