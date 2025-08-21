<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Landing Page</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="bg-blue-50 flex items-center justify-center h-screen">

<div class="w-full max-w-7xl bg-blue-100 rounded-3xl shadow-lg p-8">
    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-blue-800 mb-2">FORMULIR KUNJUNGAN TAMU</h1>
        <p class="text-blue-700 font-medium">Mitra Teknik</p>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-6 text-center font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <form method="POST" id="form" action="{{ route('submit') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        <!-- Kolom kiri -->
        <div class="space-y-6">
            <div>
                <label class="block font-semibold mb-2 text-blue-700">Nama*</label>
                <input type="text" name="name" placeholder="Masukkan nama Anda" class="w-full border border-blue-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <!-- <div>
                <label class="block font-semibold mb-2 text-blue-700">Nomer HP*</label>
                <input type="tel" name="nohp" maxlength="13" placeholder="Masukkan No HP/WA Anda" class="w-full border border-blue-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div> -->
            <div>
                <label class="block font-semibold mb-2 text-blue-700">Alamat/Instansi*</label>
                <input type="text" name="alamat" placeholder="Masukkan alamat/instansi Anda" class="w-full border border-blue-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <!-- <div>
                <label class="block font-semibold mb-2 text-blue-700">Jam Masuk*</label>
                <input type="time" id="masuk" name="masuk" min="00:00" max="23:59" step="300" class="w-full border border-blue-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div> -->
            <div>
                <fieldset disabled>
                    <label class="block font-semibold mb-2 text-blue-700">Jam Keluar*</label>
                    <input type="time" id="keluar" name="keluar" min="00:00" max="23:59" step="300" class="w-full border border-blue-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </fieldset>
            </div>
            <div>
                <label class="block font-semibold mb-2 text-blue-700">Keperluan*</label>
                <input type="text" name="keperluan" placeholder="Tulis keperluan Anda" class="w-full border border-blue-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>

        <!-- Kolom kanan -->
        <div class="space-y-6">
            
            <div>
                <label class="block font-semibold mb-2 text-blue-700">Bukti Identitas*</label>
                <select name="identitas" class="w-full border border-blue-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="KTP">KTP</option>
                    <option value="SIM">SIM</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div> 
                <label class="block font-semibold mb-2 text-blue-700">No Kartu Daerah Bebas/Terbatas*</label> 
                <input type="text" name="daerah" style="text-transform: uppercase;" placeholder="Silahkan Tap Kartu Daerah Bebas/Terbatas Anda" class="w-full border border-blue-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
            <label class="block font-semibold mb-2 text-blue-700">No Kartu Kendaraan*</label>
                <select name="nokartu" class="w-full border border-blue-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="R2">R2</option>
                    <option value="R4">R4</option>
                    <option value="Lainnya">L</option>
                </select>
            </div>
            <div>
                <label class="block font-semibold mb-2 text-blue-700">No Polisi*</label>
                <input type="text" name="nopol" maxlength="8" style="text-transform: uppercase;" placeholder="Masukkan Nomor Polisi Anda" class="w-full border border-blue-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>
        <!-- Tombol -->
        <div class="col-span-2">
        <button type="submit" 
            class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700">
            Kirim
        </button>
</div>

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#masuk", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });

    flatpickr("#keluar", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });

    // Log ke console sebelum submit
    document.getElementById("form").addEventListener("submit", function() {
        console.log("Jam Masuk:", document.getElementById("masuk").value);
        console.log("Jam Keluar:", document.getElementById("keluar").value);
    });
</script>




</body>
</html>
