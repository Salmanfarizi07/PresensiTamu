<table class="min-w-full bg-white shadow rounded-lg text-sm">
    <thead class="bg-gray-600 text-white">
        <tr>
            <th class="px-4 py-2">No</th>
            <th class="px-4 py-2">Nama</th>
            <th class="px-4 py-2">Alamat/Instansi</th>
            <th class="px-4 py-2">Jumlah</th>
            <th class="px-4 py-2">Masuk</th>
            <th class="px-4 py-2">Keluar</th>
            <th class="px-4 py-2">Keperluan</th>
            <th class="px-4 py-2">Tujuan</th>
            <th class="px-4 py-2">Bukti Identitas</th>
            <th class="px-4 py-2">No Kartu Zona</th>
            <th class="px-4 py-2">Jenis Kendaraan</th>
            <th class="px-4 py-2">No Kendaraan</th>
        </tr>
    </thead>
    <tbody>
        @forelse($laporans as $i => $item)
        <tr class="text-gray-800 border-b">
            <td class="px-4 py-2">{{ $i + 1 }}</td>
            <td class="px-4 py-2">{{ $item->name }}</td>
            <td class="px-4 py-2">{{ $item->alamat }}</td>
            <td class="px-4 py-2">{{ $item->jumlah }}</td>
            <td class="px-4 py-2">{{ $item->created_at->format('d M Y H:i') }}</td>
            <td class="px-4 py-2">{{ $item->keluar ?? '-' }}</td>
            <td class="px-4 py-2">{{ $item->keperluan ?? '-' }}</td>
            <td class="px-4 py-2">{{ $item->tujuan_id ?? '-' }}</td>
            <td class="px-4 py-2">{{ $item->identitas ?? '-' }}</td>
            <td class="px-4 py-2">{{ $item->daerah ?? '-' }}</td>
            <td class="px-4 py-2">{{ $item->nokartu ?? '-' }}</td>
            <td class="px-4 py-2">{{ $item->nopol ?? '-' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center py-4">Belum ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>
@if($laporans instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="mt-2">
        {{ $laporans->links() }}
    </div>
@endif


