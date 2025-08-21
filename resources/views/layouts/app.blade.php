<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Dashboard')</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>
body{margin:0;font-family:Arial;background:#f4f7fa;}
.sidebar{width:220px;background:#2563eb;height:100vh;position:fixed;top:0;left:0;color:white;padding-top:20px;}
.sidebar a{display:block;color:white;padding:12px 20px;text-decoration:none;font-weight:500;margin-bottom:5px;border-radius:4px;}
.sidebar a:hover{background:#1e40af;}
.logout-btn{display:block;width:calc(100% - 40px);margin:10px 20px;padding:10px;background:#dc2626;color:white;border:none;border-radius:6px;font-weight:500;cursor:pointer;}
.logout-btn:hover{background:#b91c1c;}
.main{margin-left:220px;padding:20px;}
</style>
</head>
<body>

<div class="sidebar">
    <h2 class="text-center text-white font-bold text-xl mb-6">Dashboard</h2>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('datatamu') }}">Data Tamu</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</div>

<div class="main">
    @yield('content')
</div>

</body>
</html>
