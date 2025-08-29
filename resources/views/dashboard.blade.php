@extends('layouts.app')
@section('title','Dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-2">Dashboard</h1>
<p class="text-gray-500">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>

<!-- Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-5">
    <!-- Total Kunjungan Hari Ini -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 transition duration-300 hover:border-blue-500 hover:shadow-md cursor-pointer">
        <h2 class="text-sm font-medium text-gray-500">Total Kunjungan Hari ini</h2>
        <div class="flex items-center mt-3 space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 8.25h18M4.5 21h15a1.5 1.5 0 001.5-1.5V7.5a1.5 1.5 0 00-1.5-1.5h-15A1.5 1.5 0 003 7.5v12a1.5 1.5 0 001.5 1.5z" />
            </svg>
            <p class="text-2xl font-bold text-blue-700">{{ $totalHariIni }}</p>
        </div>
    </div>

    <!-- Total Tamu Didalam -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 transition duration-300 hover:border-yellow-500 hover:shadow-md cursor-pointer">
        <h2 class="text-sm font-medium text-gray-500">Total Tamu Didalam</h2>
        <div class="flex items-center mt-3 space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-green-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-lg font-bold text-green-600">{{ $totalTamuAktif }}</p>
        </div>
    </div>

    <!-- Total Tamu Keluar -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 transition duration-300 hover:border-red-500 hover:shadow-md cursor-pointer">
        <h2 class="text-sm font-medium text-gray-500">Total Tamu Sudah Keluar</h2>
        <div class="flex items-center mt-3 space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-red-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25a2.25 2.25 0 00-2.25-2.25h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 12h.008v.008H18V12z" />
            </svg>
            <p class="text-2xl font-bold text-red-700">{{ $totalTamuNonAktif }}</p>
        </div>
    </div>
</div>

<!-- Filter & Table -->
<div class="bg-white shadow-md rounded-xl p-4 mt-5 mb-4 overflow-x-auto">
    <!-- Filter Form -->
    <form method="GET" action="{{ route('dashboard') }}" class="flex flex-wrap items-center gap-2 mb-4">

        <!-- Status -->
        <select name="status" class="p-2 rounded-lg border border-gray-300">
            <option value="">-- Semua Status --</option>
            <option value="aktif"   {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="nonaktif"{{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
        </select>

        <!-- Search -->
        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Cari nama / alamat / id_kartu..."
            class="p-2 rounded-lg border border-gray-300 w-64">

        <!-- Per Page -->
        <select name="per_page" class="p-2 rounded-lg border border-gray-300">
            <option value="10"   {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
            <option value="25"   {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
            <option value="50"   {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
            <option value="all"  {{ request('per_page') == 'all' ? 'selected' : '' }}>Semua</option>
        </select>

        <!-- Tombol -->
        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700">
            Filter
        </button>

    </form>


    <div id="tableContainer" class="overflow-x-auto">
        @include('partials.submissions-table', ['submissions' => $submissions, 'perPage' => $perPage])
    </div>
</div>

<!-- JS Filter / Search / Auto refresh -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const perPageFilter = document.getElementById('perPageFilter');
    const tableContainer = document.getElementById('tableContainer');
    const refreshButton = document.getElementById('refreshButton');

    let timeout = null;

    function fetchData(reset = false) {
        if(reset){
            searchInput.value = '';
            statusFilter.value = '';
            perPageFilter.value = 10;
        }

        const params = new URLSearchParams({
            search: searchInput.value,
            status: statusFilter.value,
            per_page: perPageFilter.value
        });

        fetch("{{ route('dashboard.data') }}?" + params.toString())
            .then(res => res.text())
            .then(html => { tableContainer.innerHTML = html; 
        });
    }

    searchInput.addEventListener('keyup', ()=>{ clearTimeout(timeout); timeout = setTimeout(fetchData, 300); });
    statusFilter.addEventListener('change', fetchData);
    perPageFilter.addEventListener('change', fetchData);
    refreshButton.addEventListener('click', ()=>fetchData(false));

    // Auto-check new data every 5s
    let lastCount = {{ $submissions instanceof \Illuminate\Pagination\LengthAwarePaginator ? $submissions->total() : $submissions->count() }};
    setInterval(() => {
        const params = new URLSearchParams({
            check_new: 1,
            search: searchInput.value,
            status: statusFilter.value,
            per_page: perPageFilter.value
        });

        fetch("{{ route('dashboard.data') }}?" + params.toString())
            .then(r => r.json())
            .then(data => {
                if(data.count > lastCount){
                    tableContainer.innerHTML = data.html;
                    lastCount = data.count;
                    Swal.fire({
                        icon: 'success',
                        title: 'Ada Data Baru!',
                        text: 'Silakan cek tabel terbaru.',
                        timer: 3000,
                        showConfirmButton: false
                    });
                }
            });
    }, 5000);
});
</script>
@endsection
