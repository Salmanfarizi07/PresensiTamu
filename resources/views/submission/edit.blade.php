@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Data Tamu</h1>

<form id="editForm" action="{{ route('submission.update', $submission->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Nama:</label>
        <input type="text" name="name" value="{{ old('name', $submission->name) }}" class="border p-2 w-full">
    </div>

    <div>
        <label>Alamat/Instansi:</label>
        <input type="text" name="alamat" value="{{ old('alamat', $submission->alamat) }}" class="border p-2 w-full">
    </div>

    <div>
        <label>Keluar:</label>
        <input type="time" name="keluar" value="{{ old('keluar', $submission->keluar) }}" class="border p-2 w-full">
    </div>

    <div>
        <label>Keperluan:</label>
        <input type="text" name="keperluan" value="{{ old('keperluan', $submission->keperluan) }}" class="border p-2 w-full">
    </div>

    <div>
        <label class="block font-semibold mb-2 text-blue-700">Bukti Identitas*</label>
        <select name="identitas" class="w-full border border-blue-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <option value="KTP" {{ old('identitas', $submission->identitas) == 'KTP' ? 'selected' : '' }}>KTP</option>
            <option value="SIM" {{ old('identitas', $submission->identitas) == 'SIM' ? 'selected' : '' }}>SIM</option>
            <option value="Lainnya" {{ old('identitas', $submission->identitas) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
        </select>
    </div>

    <div>
        <label>No Kartu Daerah Bebas/Terbatas:</label>
        <input type="text" name="daerah" value="{{ old('daerah', $submission->daerah) }}" class="border p-2 w-full">
    </div>

    <div>
        <label class="block font-semibold mb-2 text-blue-700">No Kartu Kendaraan</label>
        <select name="nokartu" class="w-full border border-blue-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <option value="R2" {{ old('nokartu', $submission->nokartu) == 'R2' ? 'selected' : '' }}>R2</option>
            <option value="R4" {{ old('nokartu', $submission->nokartu) == 'R4' ? 'selected' : '' }}>R4</option>
            <option value="Lainnya" {{ old('nokartu', $submission->nokartu) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
        </select>
    </div>

    <div>
        <label>No Polisi:</label>
        <input type="text" name="nopol" value="{{ old('nopol', $submission->nopol) }}" class="border p-2 w-full">
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Update</button>
</form>

<!-- Tambah SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $('#editForm').on('submit', function(e) {
        e.preventDefault();

        let form = $(this);
        let url = form.attr('action');
        let data = form.serialize();

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            success: function(res) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil diupdate',
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    window.location.href = "{{ route('datatamu') }}"; 
                });
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan, silakan coba lagi'
                });
            }
        });
    });
</script>
@endsection
