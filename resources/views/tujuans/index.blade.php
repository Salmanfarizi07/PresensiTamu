@extends('layouts.app')
@section('title','Data PIC')

@section('content')
<h1 class="text-2xl font-bold mb-6">Data PIC</h1>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-5">
    @foreach($rekapKunjunganPerUnit as $unit => $total)
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 transition duration-300 hover:border-blue-500 hover:shadow-md cursor-pointer flex items-center justify-between">
        
        <!-- Icon Kiri -->
        <div class="flex-shrink-0">
            <p class="text-sm font-medium text-gray-700">Total Kunjungan</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-blue-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 8.25h18M4.5 21h15a1.5 1.5 0 001.5-1.5V7.5a1.5 1.5 0 00-1.5-1.5h-15A1.5 1.5 0 003 7.5v12a1.5 1.5 0 001.5 1.5z" />
            </svg>
        </div>

        <!-- Text Kanan -->
        <div class="text-right">
            <h2 class="text-xl font-medium text-gray-500">{{ $unit }}</h2>
            <p class="text-4xl font-bold text-blue-700">{{ $total }}</p>
        </div>
    </div>
    @endforeach
</div>
<div class="flex flex-col md:flex-row md:items-center mt-5 md:justify-between mb-4 gap-2">

    <!-- Kiri: Tombol Tambah Data + Filter Unit -->
    <div class="flex flex-col md:flex-row md:items-center gap-2">
        <!-- Tombol Tambah Data -->
        <a href="{{ route('tujuans.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition text-center">
            Tambah Data
        </a>

        <!-- Filter Unit -->
        <form method="GET" action="{{ route('tujuans.index') }}" 
              class="flex flex-col sm:flex-row sm:items-center gap-2 w-full md:w-auto">
            <label for="unit" class="font-semibold text-gray-700"></label>
            <select name="unit" id="unit" onchange="this.form.submit()" 
                class="border border-gray-300 rounded-lg px-3 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition w-full sm:w-auto">
                <option value="">Semua</option>
                <option value="UPT" {{ $unitFilter == 'UPT' ? 'selected' : '' }}>UPT</option>
                <option value="UP2B" {{ $unitFilter == 'UP2B' ? 'selected' : '' }}>UP2B</option>
            </select>
        </form>
    </div>

    <!-- Kanan: Download PDF -->
    <form action="{{ route('tujuans.picPdf') }}" method="GET" target="_blank" 
          class="flex flex-wrap items-center gap-2">

        <!-- Pilih Unit -->
        <select name="unit" id="unit" 
                class="p-3 rounded-lg border border-gray-300 focus:ring-1 focus:ring-blue-500" required>
            <option value="UPT">UPT</option>
            <option value="UP2B">UP2B</option>
        </select>

        <!-- Pilih Filter Periode -->
        <select name="filter" id="filter" 
                class="p-3 rounded-lg border border-gray-300 focus:ring-1 focus:ring-blue-500"
                onchange="toggleDates(this.value)">
            <option value="today">Hari Ini</option>
            <option value="week">Minggu Ini</option>
            <option value="month">Bulan Ini</option>
            <option value="range">Periode</option>
        </select>

        <!-- Input Periode Manual -->
        <input type="date" name="start_date" id="start_date" 
            class="p-3 rounded-lg border border-gray-300 hidden">
        <input type="date" name="end_date" id="end_date" 
            class="p-3 rounded-lg border border-gray-300 hidden">

        <!-- Tombol PDF -->
        <button type="submit"
                class="flex items-center gap-1 bg-red-600 text-white px-3 py-2 rounded-lg hover:bg-red-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v8m0 0l-4-4m4 4l4-4M12 4v8" />
            </svg>
            PDF
        </button>
    </form>
</div>


<div class="overflow-x-auto text-sm mt-2">
    <table class="min-w-full bg-white shadow rounded-lg">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="px-4 py-2 text-left">No</th>
                <th class="px-4 py-2 text-left">Nama</th>
                <th class="px-4 py-2 text-left">Jabatan</th>
                <th class="px-4 py-2 text-left">Unit</th>
                <th class="px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tujuans as $i => $item)
            <tr class="text-gray-800 border-b">
                <td class="px-4 py-2">{{ $i + 1 }}</td>
                <td class="px-4 py-2">{{ $item->nama }}</td>
                <td class="px-4 py-2">{{ $item->jabatan }}</td>
                <td class="px-4 py-2">
                    @if($item->unit == 'UPT')
                        <span class="text-blue-500 font-semibold">{{ $item->unit }}</span>
                    @elseif($item->unit == 'UP2B')
                        <span class="text-green-500 font-semibold">{{ $item->unit }}</span>
                    @else
                        <span>{{ $item->unit }}</span>
                    @endif
                </td>          
                <td class="px-4 py-2 flex gap-2">
                    <!-- Tombol Edit -->
                    <a href="{{ route('tujuans.edit', $item->id) }}" 
                       class="bg-yellow-500 text-white p-2 rounded hover:bg-yellow-600 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M15.232 5.232l3.536 3.536M9 13l6-6m2-2a2.121 2.121 0 113 3L7.5 21H3v-4.5L15 5z" />
                        </svg>
                    </a>

                    <!-- Tombol Delete -->
                    <form action="{{ route('tujuans.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded" style="font-family: sans-serif;">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-4">Belum ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
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
@endsection
