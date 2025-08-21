<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERMAIN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<a href="{{ url('/') }}" 
   class="inline-flex items-center bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded shadow">
    <!-- Ikon rumah -->
    <svg xmlns="http://www.w3.org/2000/svg" 
         fill="none" viewBox="0 0 24 24" 
         stroke="currentColor" class="w-5 h-5 mr-2">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M3 9.75L12 3l9 6.75V21a1.5 1.5 0 01-1.5 1.5h-15A1.5 1.5 0 013 21V9.75z" />
    </svg>
    Home
</a>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6 text-blue-700">Data Tamu Aktif</h1>
    <div class="overflow-x-auto bg-white shadow-md rounded-lg mb-10">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-left">Keluar</th>
                    <th class="px-4 py-2 text-left">Keperluan</th>
                    <th class="px-4 py-2 text-left">Identitas</th>
                    <th class="px-4 py-2 text-left">Kode Daerah</th>
                    <th class="px-4 py-2 text-left">No Kartu</th>
                    <th class="px-4 py-2 text-left">No Polisi</th>
                    <th class="px-4 py-2 text-left">Dikirim</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tamuAktif as $i => $item)
                    <tr class="border-b hover:bg-blue-50">
                        <td class="px-4 py-2">{{ $i+1 }}</td>
                        <td class="px-4 py-2">{{ $item->name }}</td>
                        <td class="px-4 py-2">{{ $item->alamat }}</td>
                        <td class="px-4 py-2">{{ $item->keluar }}</td>
                        <td class="px-4 py-2">{{ $item->keperluan }}</td>
                        <td class="px-4 py-2">{{ $item->identitas }}</td>
                        <td class="px-4 py-2">{{ $item->daerah }}</td>
                        <td class="px-4 py-2">{{ $item->nokartu }}</td>
                        <td class="px-4 py-2">{{ $item->nopol }}</td>
                        <td class="px-4 py-2">{{ $item->created_at->format('d M Y H:i') }}</td>
                        <td class="px-4 py-2 text-center">
                            <form action="{{ route('submission.selesai', $item->id) }}" method="POST"
                                    onsubmit="return confirmKode('{{ $item->daerah }}')">
                                @csrf 
                                @method('PUT')
                                <button type="submit" 
                                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded">
                                    Selesai
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center py-4 text-gray-500">Belum ada tamu aktif</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <h1 class="text-2xl font-bold mb-6 text-gray-700">Data Tamu Nonaktif</h1>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-left">Keluar</th>
                    <th class="px-4 py-2 text-left">Keperluan</th>
                    <th class="px-4 py-2 text-left">Identitas</th>
                    <th class="px-4 py-2 text-left">Kode Daerah</th>
                    <th class="px-4 py-2 text-left">No Kartu</th>
                    <th class="px-4 py-2 text-left">No Polisi</th>
                    <th class="px-4 py-2 text-left">Dikirim</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tamuNonAktif as $i => $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $i+1 }}</td>
                        <td class="px-4 py-2">{{ $item->name }}</td>
                        <td class="px-4 py-2">{{ $item->alamat }}</td>
                        <td class="px-4 py-2">{{ $item->keluar }}</td>
                        <td class="px-4 py-2">{{ $item->keperluan }}</td>
                        <td class="px-4 py-2">{{ $item->identitas }}</td>
                        <td class="px-4 py-2">{{ $item->daerah }}</td>
                        <td class="px-4 py-2">{{ $item->nokartu }}</td>
                        <td class="px-4 py-2">{{ $item->nopol }}</td>
                        <td class="px-4 py-2">{{ $item->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center py-4 text-gray-500">Belum ada tamu nonaktif</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

    <!-- Script konfirmasi -->
<script>
function confirmKode(kodeAsli) {
    let inputKode = prompt("Masukkan Kode Kartu Daerah untuk konfirmasi:");
    if (inputKode === null) return false; // user batal
    if (inputKode === kodeAsli) {
        return true; // lanjut submit
    } else {
        alert("❌ Kode salah, presensi tidak dapat diselesaikan!");
        return false;
    }
}
</script>

</body>
</html>
