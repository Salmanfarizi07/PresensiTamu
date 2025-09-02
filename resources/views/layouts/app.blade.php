<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('ai.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body{margin:0;font-family:Arial,sans-serif;background:#f4f7fa;}

        /* Sidebar */
        .sidebar {
            width: 220px; height: 100vh;
            position: fixed; top:0; left:0;
            color:white; background:linear-gradient(180deg,#1e3a8a,#2563eb,#3b82f6);
            transition: all 0.3s ease-in-out;
            display: flex; flex-direction: column;
            z-index:50;
        }
        .sidebar.collapsed { width:60px; }
        .sidebar .sidebar-header { display:flex; align-items:center; justify-content:space-between; padding:15px; }
        .sidebar a { display:flex; align-items:center; gap:10px; color:white; padding:12px 20px; text-decoration:none; font-weight:500; margin-bottom:5px; border-radius:4px; white-space: nowrap; transition: all 0.3s; }
        .sidebar a:hover { background:#1e40af; }
        .sidebar .text { transition: opacity 0.2s, width 0.2s; }
        .sidebar.collapsed .text { opacity:0; width:0; overflow:hidden; }
        .logout-btn { display:flex;align-items:center;gap:10px;margin:10px 20px;padding:12px 20px;background:#dc2626;color:white;border:none;border-radius:6px;font-weight:500;cursor:pointer;white-space: nowrap;transition: all 0.3s; }
        .logout-btn:hover{background:#b91c1c;}
        .sidebar.collapsed a, .sidebar.collapsed .logout-btn { justify-content:center; gap:0; padding:12px 0; }
        .main { margin-left:220px; padding:20px; transition: margin-left 0.3s ease-in-out; }
        .main.full { margin-left:60px; }

        /* Mobile */
        @media (max-width: 768px){
            .sidebar { left:-100%; width:220px; }
            .sidebar.show { left:0; }
            .main { margin-left:0 !important; }
        }

        /* Overlay for mobile */
        #sidebar-overlay { display:none; }
        #sidebar-overlay.show { display:block; }
    </style>
</head>
<body>

<!-- Mobile Header -->
<div class="md:hidden flex items-center p-2 bg-white shadow">
    <button onclick="toggleSidebar()">
        <i data-lucide="menu" class="w-6 h-6"></i>
    </button>
    <span class="ml-2 font-bold">Menu</span>
</div>

<!-- Overlay Mobile -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-30 z-40" onclick="toggleSidebar()"></div>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <button onclick="toggleSidebar()" class="text-white mr-3">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
    </div>

    <a href="{{ route('dashboard') }}">
        <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
        <span class="text">Dashboard</span>
    </a>
    <a href="{{ route('submission.datatamu') }}">
        <i data-lucide="notebook" class="w-5 h-5"></i>
        <span class="text">Data Tamu</span>
    </a>
    <a href="{{ route('zones') }}">
        <i data-lucide="map" class="w-5 h-5"></i>
        <span class="text">Data Kartu Zona</span>
    </a>
    <a href="{{ route('laporans') }}">
        <i data-lucide="file-text" class="w-5 h-5"></i>
        <span class="text">Laporan</span>
    </a>
    <a href="{{ route('users.index') }}">
        <i data-lucide="users" class="w-5 h-5"></i>
        <span class="text">Data User</span>
    </a>
    <a href="{{ route('tujuans.index') }}">
        <i data-lucide="airplay" class="w-5 h-5"></i>
        <span class="text">Data Pegawai</span>
    </a>
    <a href="{{ route('setting') }}">
        <i data-lucide="settings" class="w-5 h-5"></i>
        <span class="text">Pengaturan</span>
    </a>

    <!-- Logout -->
    <form id="logout-form" method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="button" id="logout-btn" class="logout-btn">
            <i data-lucide="log-out" class="w-5 h-5"></i>
            <span class="text">Logout</span>
        </button>
    </form>

    <!-- Profile / Name di bawah -->
    <div class="flex flex-col gap-2 mt-auto">
        <a href="{{ route('datauser') }}">
            <i data-lucide="user-round" class="w-5 h-5"></i>
            <span class="text">{{ Auth::user()->name }}</span>
        </a>
    </div>
</div>

<!-- Main Content -->
<div id="main" class="main">
    @yield('content')
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();

    const sidebar = document.getElementById("sidebar");
    const main = document.getElementById("main");
    const overlay = document.getElementById("sidebar-overlay");

    function toggleSidebar() {
        if(window.innerWidth < 768){
            sidebar.classList.toggle("show");
            overlay.classList.toggle("show");
        }else{
            sidebar.classList.toggle("collapsed");
            main.classList.toggle("full");
        }
    }

    // Sidebar links behavior
    document.querySelectorAll("#sidebar a").forEach(link=>{
        link.addEventListener("click", function(){
            if(window.innerWidth < 768){
                sidebar.classList.remove("show");
                overlay.classList.remove("show");
            }
        });
    });

    // Logout confirmation
    document.getElementById("logout-btn").addEventListener("click", function(){
        Swal.fire({
            title: 'Yakin mau logout?',
            text: "Kamu akan keluar dari sesi ini.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2563eb',
            cancelButtonColor: '#dc2626',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal'
        }).then((result)=>{
            if(result.isConfirmed){
                document.getElementById("logout-form").submit();
            }
        });
    });
</script>

</body>
</html>
