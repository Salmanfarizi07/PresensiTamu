@extends('layouts.app')
@section('title','Data Tamu')

@section('content')
<h1 class="text-2xl font-bold font-mont mb-6">Data Tamu</h1>

<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-4">
    
    <!-- Kolom Kiri: Tambah Data + Search + Filter -->
    <div class="flex flex-col sm:flex-row flex-wrap items-stretch gap-3 w-full md:w-auto">

        <!-- Tombol Tambah Data -->
        <a href="/submission/add" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition text-center w-full sm:w-auto">
            Tambah Data
        </a>

        <!-- Search -->
        <input type="text" id="search" name="search" placeholder="Cari nama, alamat, keperluan atau no kendaraan..." 
               class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 w-full sm:w-60">

        <!-- Filter Status -->
        <select name="status" id="status" 
                class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 w-full sm:w-auto">
            <option value="">Semua</option>
            <option value="pending">Pending</option>
            <option value="aktif">Aktif</option>
        </select>

        <!-- Per Page -->
        <select name="perPage" id="perPage" 
                class="border border-gray-300 text-center rounded-lg px-1 py-2 focus:ring-2 focus:ring-blue-400 w-full sm:w-auto">
            <option value="5">5</option>
            <option value="10" selected>10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="all">Semua</option>
        </select>
    </div>

    <!-- Kolom Kanan: Reset Data Nonaktif -->
    <form action="{{ route('submission.resetNonaktif') }}" method="POST" 
          onsubmit="return confirm('Yakin mau reset semua tamu nonaktif?');"
          class="w-full md:w-auto">
        @csrf
        @method('DELETE')
        <button type="submit" 
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow w-full md:w-auto">
            Reset Data Nonaktif
        </button>
    </form>
</div>


<!-- Table Container -->
<div id="tableContainer">
    @include('partials.table', ['submissions' => $submissions])
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const statusSelect = document.getElementById('status');
    const perPageSelect = document.getElementById('perPage');
    const tableContainer = document.getElementById('tableContainer');

    function loadTable(pageUrl = null) {
        const status = statusSelect.value;
        const search = searchInput.value;
        const perPage = perPageSelect.value;

        let url = pageUrl ?? `{{ route('submission.datatamu') }}`;
        url += `?status=${status}&search=${search}&perPage=${perPage}`;

        fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } }) // penting
            .then(response => response.text())
            .then(html => {
                tableContainer.innerHTML = html;

                // re-bind pagination links
                tableContainer.querySelectorAll('.pagination a').forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        loadTable(this.getAttribute('href'));
                    });
                });
            })
            .catch(err => console.error(err));
    }


    statusSelect.addEventListener('change', () => loadTable());
    searchInput.addEventListener('keyup', () => loadTable());
    perPageSelect.addEventListener('change', () => loadTable());

    // initial pagination binding
    document.querySelectorAll('.pagination a').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            loadTable(this.getAttribute('href'));
        });
    });
});
</script>
@endsection
