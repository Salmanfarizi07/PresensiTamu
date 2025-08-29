@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-6 text-center">
        <h2 class="text-2xl font-bold mb-4">Laporan Data Nonaktif</h2>
        
        <div class="bg-red-100 text-red-700 p-6 rounded-lg shadow-md">
            <p class="text-xl font-semibold">Total Data Nonaktif:</p>
            <p class="text-3xl font-bold mt-2">{{ $totalNonaktif }}</p>
        </div>
    </div>
</div>
@endsection
