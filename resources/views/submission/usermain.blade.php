@extends('layouts.app')
@section('title','Data Tamu')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-red-600">Pending</h1>
<div class="overflow-x-auto text-sm mt-0">
    <table class="min-w-full bg-white shadow rounded-lg">
        <thead class="bg-red-600 text-white">
            <tr>
                <th class="px-4 py-2 text-center">No</th>
                <th class="px-4 py-2 text-center">Nama</th>
                <th class="px-4 py-2 text-center">Alamat</th>
                <th class="px-4 py-2 text-center">Jumlah</th>
                <th class="px-4 py-2 text-center">Masuk</th>
                <th class="px-4 py-2 text-center">Keluar</th>
                <th class="px-4 py-2 text-center">Keperluan</th>
                <th class="px-4 py-2 text-center">Identitas</th>
                <th class="px-4 py-2 text-center">Kode Daerah</th>
                <th class="px-4 py-2 text-center">Kendaraan</th>
                <th class="px-4 py-2 text-center">No Polisi</th>
                <th class="px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tamuPending as $i => $item)
            <tr class="text-gray-800 border-b">
                <td class="px-4 py-2">{{ $i+1 }}</td>
                <td class="px-4 py-2">{{ $item->name }}</td>
                <td class="px-4 py-2">{{ $item->alamat }}</td>
                <td class="px-4 py-2">{{ $item->jumlah }}</td>
                <td class="px-4 py-2">
                    {{ $item->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}
				</td>
                <td class="px-4 py-2">{{ $item->keluar }}</td>
                <td class="px-4 py-2">{{ $item->keperluan }}</td>
                <td class="px-4 py-2">{{ $item->identitas }}</td>
                <td class="px-4 py-2">{{ $item->daerah }}</td>
                <td class="px-4 py-2">{{ $item->nokartu }}</td>
                <td class="px-4 py-2">{{ $item->nopol }}</td>
                <td class="px-4 py-2 text-center">
					<button onclick="openAccModal({{ $item->id }})" 
                            class="bg-blue-500 text-white px-3 py-1 rounded">
                        Terima
                    </button>
				</td>

            </tr>
            @empty
            <tr>
				<td colspan="10" class="text-center py-4 text-gray-500">Belum ada tamu Pending</td>
			</tr>
            @endforelse
        </tbody>
    </table>
    <!-- Modal untuk Acc pending -->
    <div id="accModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-5 rounded shadow-lg w-80">
            <h3 class="text-lg font-bold mb-2">Masukkan No Daerah</h3>
            <form id="accForm" method="POST">
                @csrf
                <input type="text" name="daerah" class="border p-2 rounded w-full mb-4" placeholder="No Daerah" required>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-full">Terima</button>
                <button type="button" onclick="closeAccModal()" class="bg-gray-500 text-white px-4 py-2 rounded w-full mt-2">Batal</button>
            </form>
        </div>
    </div>
</div>
<!-- Aktif -->
<h1 class="text-2xl font-bold mb-6 text-blue-700 mt-10">Masuk</h1>
<div class="overflow-x-auto text-sm mt-0">
    <table class="min-w-full bg-white shadow rounded-lg">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="px-4 py-2 text-center">No</th>
                <th class="px-4 py-2 text-center">Nama</th>
                <th class="px-4 py-2 text-center">Alamat</th>
                <th class="px-4 py-2 text-center">Jumlah</th>
                <th class="px-4 py-2 text-center">Masuk</th>
                <th class="px-4 py-2 text-center">Keluar</th>
                <th class="px-4 py-2 text-center">Keperluan</th>
                <th class="px-4 py-2 text-center">Identitas</th>
                <th class="px-4 py-2 text-center">Kode Daerah</th>
                <th class="px-4 py-2 text-center">Kendaraan</th>
                <th class="px-4 py-2 text-center">No Polisi</th>
                <th class="px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tamuAktif as $i => $item)
            <tr class="text-gray-800 border-b">
                <td class="px-4 py-2">{{ $i+1 }}</td>
                <td class="px-4 py-2">{{ $item->name }}</td>
                <td class="px-4 py-2">{{ $item->alamat }}</td>
                <td class="px-4 py-2">{{ $item->jumlah }}</td>
                <td class="px-4 py-2">
                    {{ $item->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}
                </td>
                <td class="px-4 py-2">{{ $item->keluar }}</td>
                <td class="px-4 py-2">{{ $item->keperluan }}</td>
                <td class="px-4 py-2">{{ $item->identitas }}</td>
                <td class="px-4 py-2">{{ $item->daerah }}</td>
                <td class="px-4 py-2">{{ $item->nokartu }}</td>
                <td class="px-4 py-2">{{ $item->nopol }}</td>
                <td class="px-4 py-2 text-center">
                    <button onclick="openCheckoutModal({{ $item->id }})"
                            class="bg-red-500 text-white px-3 py-1 rounded">
                        Selesai
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center py-4 text-gray-500">Belum ada tamu aktif</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Cheackout -->
<div id="checkoutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-5 rounded shadow-lg w-80">
        <h3 class="text-lg font-bold mb-2">Masukkan No Daerah</h3>
        <form id="checkoutForm">
            @csrf
            <input type="text" name="daerah" class="border p-2 rounded w-full mb-4" placeholder="No Daerah" required>
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded w-full">
                Selesai
            </button>
            <button type="button" onclick="closeCheckoutModal()" class="bg-gray-500 text-white px-4 py-2 rounded w-full mt-2">
                Batal
            </button>
        </form>
    </div>
</div>


    
<!-- Nonaktif -->
<h1 class="text-2xl font-bold mb-6 text-gray-700 mt-10">Keluar</h1>
<div class="overflow-x-auto text-sm mt-0">
    <table class="min-w-full bg-white shadow rounded-lg">
        <thead class="bg-gray-600 text-white">
            <tr>
                <th class="px-4 py-2 text-center">No</th>
                <th class="px-4 py-2 text-center">Nama</th>
                <th class="px-4 py-2 text-center">Alamat</th>
                <th class="px-4 py-2 text-center">Jumlah</th>
                <th class="px-4 py-2 text-center">Masuk</th>
                <th class="px-4 py-2 text-center">Keluar</th>
                <th class="px-4 py-2 text-center">Keperluan</th>
                <th class="px-4 py-2 text-center">Identitas</th>
                <th class="px-4 py-2 text-center">Kode Daerah</th>
                <th class="px-4 py-2 text-center">Kendaraan</th>
                <th class="px-4 py-2 text-center">No Polisi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tamuNonAktif as $i => $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $i+1 }}</td>
                    <td class="px-4 py-2">{{ $item->name }}</td>
                    <td class="px-4 py-2">{{ $item->alamat }}</td>
                    <td class="px-4 py-2">{{ $item->jumlah }}</td>
                    <td class="px-4 py-2">
                        {{ $item->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}
                    </td>
                    <td class="px-4 py-2">{{ $item->keluar }}</td>
                    <td class="px-4 py-2">{{ $item->keperluan }}</td>
                    <td class="px-4 py-2">{{ $item->identitas }}</td>
                    <td class="px-4 py-2">{{ $item->daerah }}</td>
                    <td class="px-4 py-2">{{ $item->nokartu }}</td>
                    <td class="px-4 py-2">{{ $item->nopol }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center py-4 text-gray-500">Belum ada tamu nonaktif</td>
                </tr>
            @endforelse
        </tbody>
    </table>
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

<script>
    function openAccModal(id){
        document.getElementById('accModal').classList.remove('hidden');
        document.getElementById('accForm').action = '/admin/pending/acc/' + id;
    }

    function closeAccModal(){
        document.getElementById('accModal').classList.add('hidden');
    }
</script>
<script>
let currentTamuId = null; // ID tamu yang akan di-Acc

// Buka modal dan set tamu ID
function openAccModal(tamuId){
    currentTamuId = tamuId;
    document.getElementById('accModal').classList.remove('hidden');
    document.querySelector('#accForm input[name="daerah"]').value = ''; // form kosong
}

// Tutup modal
function closeAccModal(){
    document.getElementById('accModal').classList.add('hidden');
}

// Submit form via AJAX
document.getElementById('accForm').addEventListener('submit', function(e){
    e.preventDefault(); // cegah reload
    let daerah = this.daerah.value;
    let token = this.querySelector('input[name="_token"]').value;

    fetch(`/tamu/acc/${currentTamuId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({ daerah: daerah })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            alert(data.message);
            closeAccModal();
            // update tabel Pending/Aktif sesuai kebutuhan
            location.reload(); // opsional, atau update row via JS
        } else {
            alert(data.message);
        }
    })
    .catch(err => {
        console.error(err);
        alert('Terjadi kesalahan!');
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
let currentCheckoutId = null;

function openCheckoutModal(tamuId){
    currentCheckoutId = tamuId;
    document.getElementById('checkoutForm').reset();
    document.getElementById('checkoutModal').classList.remove('hidden');
}

function closeCheckoutModal(){
    document.getElementById('checkoutModal').classList.add('hidden');
}

// Submit Checkout
document.getElementById('checkoutForm').addEventListener('submit', function(e){
    e.preventDefault();
    let daerah = this.daerah.value;
    let token = this.querySelector('input[name="_token"]').value;

    fetch(`/tamu/checkout/${currentCheckoutId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({ daerah: daerah })
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        if(data.success){
            closeCheckoutModal();
            Swal.fire({
                title: 'Checkout Berhasil!',
                html: `
                    <p style="font-size:16px; margin-bottom:10px;">
                        Nama: <strong>${data.name}</strong>
                    </p>
                    <p style="font-size:16px; margin-bottom:10px;">
                        Identitas: <strong>${data.identitas}</strong>
                    </p>
                    <p style="font-size:14px; margin-bottom:5px;">
                        ${data.message}
                    </p>
                `,
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6',
                width: 400,
                padding: '2em'
            }).then(() => {
                location.reload();
            });
        }
    })


    .catch(err => {
        console.error(err);
        alert('Terjadi kesalahan!');
    });

});

</script>
</body>
</html>
@endsection
