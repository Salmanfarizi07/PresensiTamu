@extends('layouts.app')
@section('title','Data Tamu')

@section('content')
<h1 class="text-2xl font-bold font-mont mb-6">Data Tamu</h1>


<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-2 md:gap-0">
    <!-- Tombol Tambah Data -->
    <a href="/submission/add" 
       class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition text-center">
        Tambah Data
    </a>

    <!-- Filter -->
    <form method="GET" action="{{ route('datatamu') }}" class="flex flex-col sm:flex-row sm:items-center gap-2 w-full md:w-auto">
        <label for="status" class="font-semibold text-gray-700">Filter Status:</label>
        <select name="status" id="status" onchange="this.form.submit()" 
            class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition w-full sm:w-auto">
            <option value="">Semua</option>
            <option value="pending" {{ ($statusFilter ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="aktif" {{ ($statusFilter ?? '') == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="nonaktif" {{ ($statusFilter ?? '') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
        </select>
    </form>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow rounded-lg text-sm">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Alamat</th>
                <th class="px-4 py-2">Jumlah</th>
                <th class="px-4 py-2">Masuk</th>
                <th class="px-4 py-2">Keluar</th>
                <th class="px-4 py-2">Keperluan</th>
                <th class="px-4 py-2">Tujuan</th>
                <th class="px-4 py-2">Identitas</th>
                <th class="px-4 py-2">No Daerah Bebas/Terbatas</th>
                <th class="px-4 py-2">Kendaraan</th>
                <th class="px-4 py-2">No Polisi</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($submissions as $i => $item)
            <tr class="text-gray-800 border-b">
                <td class="px-4 py-2">{{ $i+1 }}</td>
                <td class="px-4 py-2">{{ $item->name }}</td>
                <td class="px-4 py-2">{{ $item->alamat }}</td>
                <td class="px-4 py-2">{{ $item->jumlah }}</td>
                <td class="px-4 py-2">{{ $item->created_at->format('d M Y H:i') }}</td>
                <td class="px-4 py-2">{{ $item->keluar }}</td>
                <td class="px-4 py-2">{{ $item->keperluan }}</td>
                <td class="px-4 py-2">{{ $item->tujuan_id }}</td>
                <td class="px-4 py-2">{{ $item->identitas }}</td>
                <td class="px-4 py-2">{{ $item->daerah }}</td>
                <td class="px-4 py-2">{{ $item->nokartu }}</td>
                <td class="px-4 py-2">{{ $item->nopol }}</td>
                <td class="px-4 py-2">
                    @if($item->status == 'pending')
                        <span class="text-red-600 font-bold">Pending</span>
                    @elseif($item->status == 'aktif')
                        <span class="text-green-600 font-bold">Aktif</span>
                    @elseif($item->status == 'nonaktif')
                        <span class="text-gray-600 font-bold">Nonaktif</span>
                    @endif
                </td>
                
                <td class="px-4 py-2 flex flex-col sm:flex-row gap-2">
                    @if($item->status === 'aktif')
                        <a href="{{ route('submission.edit', $item->id) }}" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded w-full sm:w-auto">Edit</a>
                    @else
                        <span class="text-gray-400">Tidak Tersedia</span>
                    @endif
                    <form action="{{ route('submission.forceDelete', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini permanen?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded w-full sm:w-auto">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="13" class="text-center py-4">Belum ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    <form action="{{ route('submission.resetNonaktif') }}" method="POST" onsubmit="return confirm('Yakin mau reset semua tamu nonaktif?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow w-full sm:w-auto">
            🔄 Reset Data Nonaktif
        </button>
    </form>
</div>

@endsection
