@extends('layouts.app')
@section('title','Data Tamu')

@section('content')
<h1 class="text-2xl font-bold mb-6">Data Tamu</h1>
<!-- Tombol Export Semua PDF -->
<form action="{{ url('/cetak-tamu') }}" method="get" class="fixed top-4 right-40">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Unduh Semua
    </button>
</form>
<!-- Form Filter PDF -->
<form action="{{ route('cetak.tamu') }}" method="GET" class="fixed top-4 right-4 bg-white p-3 rounded shadow-lg flex items-center gap-2">
    <!-- Ikon filter -->
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 019 17v-3.586L3.293 6.707A1 1 0 013 6V4z" />
    </svg>

    <!-- Input tanggal -->
    <input type="date" name="start_date" class="border px-2 py-1 rounded" required>
    <input type="date" name="end_date" class="border px-2 py-1 rounded" required>

    <!-- Tombol Export PDF -->
    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 flex items-center gap-1">
        <!-- Ikon download -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v8m0 0l-4-4m4 4l4-4M12 4v8" />
        </svg>
        PDF
    </button>
</form>

<div class="overflow-x-auto text-sm mt-20">
    <table class="min-w-full bg-white shadow rounded-lg">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Alamat</th>
                <th class="px-4 py-2">Keluar</th>
                <th class="px-4 py-2">Keperluan</th>
                <th class="px-4 py-2">Identitas</th>
                <th class="px-4 py-2">No Daerah Bebas/Terbatas</th>
                <th class="px-4 py-2">No Kartu</th>
                <th class="px-4 py-2">No Polisi</th>
                <th class="px-4 py-2">Dikirim</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($submissions as $i => $item)
            <tr class="text-gray-800 border-b">
                <td class="px-4 py-2">{{ $i+1 }}</td>
                <td class="px-4 py-2">{{ $item->name }}</td>
                <td class="px-4 py-2">{{ $item->alamat }}</td>
                <td class="px-4 py-2">{{ $item->keluar }}</td>
                <td class="px-4 py-2">{{ $item->keperluan }}</td>
                <td class="px-4 py-2">{{ $item->identitas }}</td>
                <td class="px-4 py-2">
                    {{ str_repeat('*', strlen($item->daerah)) }}
                </td>
                <td class="px-4 py-2">{{ $item->nokartu }}</td>
                <td class="px-4 py-2">{{ $item->nopol }}</td>
                <td class="px-4 py-2">{{ $item->created_at->format('d M Y H:i') }}</td>
                <td class="px-4 py-2 flex gap-2">
                    <!-- Tombol Edit (icon pensil) -->
                    <a href="{{ route('submission.edit', $item->id) }}" 
                    class="bg-yellow-500 text-white p-2 rounded hover:bg-yellow-600 flex items-center justify-center">
                        <!-- Icon pensil -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M15.232 5.232l3.536 3.536M9 13l6-6m2-2a2.121 2.121 0 113 3L7.5 21H3v-4.5L15 5z" />
                        </svg>
                    </a>

                    <!-- Tombol Delete (icon trash) -->
                    <form action="{{ route('submission.forceDelete', $item->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus data ini permanen?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">
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
    <br>

    <form action="{{ route('submission.resetNonaktif') }}" method="POST" 
          onsubmit="return confirm('Yakin mau reset semua tamu nonaktif?');">
        @csrf
        @method('DELETE')
        <button type="submit" 
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">
            🔄 Reset Data Nonaktif
        </button>
    </form>
</div>

</div>
@endsection
