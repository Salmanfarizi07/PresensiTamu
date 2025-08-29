@extends('layouts.app')

@section('title','Laporan Kunjungan')

@section('content')

<h1 class="text-2xl font-bold mb-6">Laporan Kunjungan</h1>

<div class="container mx-auto px-4">

    <!-- Filter + Download PDF satu baris -->
    <div class="bg-white shadow-md rounded-xl p-3 mb-4 flex flex-wrap items-center gap-2">

        <!-- Search -->
        <input id="searchInput" type="text" placeholder="Cari nama, alamat..." 
               class="flex-1 min-w-[150px] sm:min-w-[250px] p-2 rounded-lg border border-gray-300 focus:ring-1 focus:ring-blue-500">

        <!-- Per Page -->
        <select id="perPageFilter" name="per_page" 
                class="w-[100px] p-2 rounded-lg border border-gray-300 focus:ring-1 focus:ring-blue-500">
            <option value="10">10</option>
            <option value="50">50</option>
            <option value="all">Semua</option>
        </select>

        <!-- Refresh -->
        <button type="button" id="refreshButton" 
                class="flex items-center gap-1 px-3 py-2 rounded-lg border border-gray-300 text-blue-600 hover:bg-blue-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A9 9 0 116.582 9H20z" />
            </svg>
            Perbarui
        </button>

        <!-- Filter PDF -->
        <form action="{{ route('cetak.laporans') }}" method="GET" class="flex flex-wrap items-center gap-2">
            <select name="filter" id="filter" 
                    class="p-2 rounded-lg border border-gray-300 focus:ring-1 focus:ring-blue-500"
                    onchange="toggleDates(this.value)">
                <option value="today">Hari Ini</option>
                <option value="week">Minggu Ini</option>
                <option value="month">Bulan Ini</option>
                <option value="range">Periode</option>
            </select>

            <input type="date" name="start_date" id="start_date" class="p-2 rounded-lg border border-gray-300 hidden">
            <input type="date" name="end_date" id="end_date" class="p-2 rounded-lg border border-gray-300 hidden">

            <button type="submit"
                    class="flex items-center gap-1 bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v8m0 0l-4-4m4 4l4-4M12 4v8" />
                </svg>
                PDF
            </button>
        </form>

    </div>

    <!-- Table -->
    <div id="laporanTableContainer" class="overflow-x-auto">
        @include('laporans.partials.table', ['laporans' => $laporans])
    </div>

</div>

<!-- JS Toggle tanggal -->
<script>
function toggleDates(value) {
    const start = document.getElementById('start_date');
    const end = document.getElementById('end_date');
    if(value === 'range') {
        start.classList.remove('hidden'); 
        end.classList.remove('hidden');
        start.required = true; 
        end.required = true;
    } else {
        start.classList.add('hidden'); 
        end.classList.add('hidden');
        start.required = false; 
        end.required = false;
    }
}
</script>

<!-- JS Filter Table AJAX -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const perPageFilter = document.getElementById('perPageFilter');
    const tableContainer = document.getElementById('laporanTableContainer');
    const refreshButton = document.getElementById('refreshButton');

    function fetchData() {
        const params = new URLSearchParams({
            search: searchInput.value,
            per_page: perPageFilter.value
        });

        fetch("{{ route('laporans.data') }}?" + params.toString())
            .then(res => res.text())
            .then(html => { tableContainer.innerHTML = html; });
    }

    // Trigger
    searchInput.addEventListener('input', fetchData);
    perPageFilter.addEventListener('change', fetchData);
    refreshButton.addEventListener('click', fetchData);
});
</script>
@endsection
