<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Ganti Vite dengan Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
