<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Landing Page</title>

    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="antialiased bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">MyLaravel</h1>
            <div>
                <a href="/dashboard" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold">Dashboard</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="text-center py-20 bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di Laravel</h1>
        <p class="text-lg md:text-xl mb-6">Cepat, Modern, dan Mudah Dikembangkan</p>
        <a href="#contact" class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold shadow hover:bg-gray-100 transition">
            Hubungi Kami
        </a>
    </section>

    <!-- Contact Form Section -->
    <div id="contact" class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold text-center mb-6">Hubungi Kami</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('submit') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block font-semibold mb-1">Nama</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-semibold mb-1">Pesan</label>
                <textarea name="message" rows="4" class="w-full border rounded px-3 py-2"></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 font-semibold">Kirim</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="mt-20 text-center text-gray-500 py-6">
        &copy; {{ date('Y') }} MyLaravel. All rights reserved.
    </footer>

</body>
</html>
