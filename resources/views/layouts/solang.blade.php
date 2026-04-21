<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Solang - Sistem Peminjaman Alat</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { font-family: 'Inter', sans-serif; }

        /* Sidebar Styles */
        :root {
            --sidebar-bg: #0f172a;
            --sidebar-accent: #1e3a8a;
            --sidebar-hover: #1d4ed8;
            --sidebar-active: #2563eb;
            --sidebar-text: #94a3b8;
            --sidebar-text-active: #ffffff;
            --sidebar-width: 260px;
        }

        body { background: #f0f4ff; }

        .sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            overflow-y: auto;
            z-index: 100;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
            scrollbar-width: thin;
            scrollbar-color: #1e3a8a transparent;
        }

        .sidebar::-webkit-scrollbar { width: 4px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: #1e3a8a; border-radius: 10px; }

        .sidebar-brand {
            padding: 24px 20px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.07);
        }

        .sidebar-brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .sidebar-brand-icon {
            width: 40px; height: 40px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px; color: white; font-weight: 800;
            box-shadow: 0 4px 12px rgba(37,99,235,0.4);
            flex-shrink: 0;
        }

        .sidebar-brand-text h1 {
            font-size: 20px; font-weight: 800;
            background: linear-gradient(90deg, #60a5fa, #93c5fd);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            letter-spacing: 1px;
        }

        .sidebar-brand-text p {
            font-size: 10px; color: #475569; font-weight: 500;
            letter-spacing: 1.5px; text-transform: uppercase;
        }

        /* User Profile */
        .sidebar-user {
            margin: 16px 12px;
            padding: 12px;
            background: rgba(255,255,255,0.05);
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid rgba(255,255,255,0.06);
        }

        .user-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            display: flex; align-items: center; justify-content: center;
            font-size: 14px; font-weight: 700; color: white;
            flex-shrink: 0;
        }

        .user-info .user-name {
            font-size: 13px; color: #e2e8f0; font-weight: 600;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }

        .user-badge {
            font-size: 10px; font-weight: 600;
            padding: 1px 7px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-admin { background: rgba(37,99,235,0.25); color: #93c5fd; }
        .badge-petugas { background: rgba(16,185,129,0.2); color: #6ee7b7; }
        .badge-peminjam { background: rgba(245,158,11,0.2); color: #fcd34d; }

        /* Navigation */
        .sidebar-nav { padding: 8px 0; flex: 1; }

        .nav-section-title {
            font-size: 10px; font-weight: 700;
            color: #334155;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 12px 20px 6px;
        }

        .nav-item {
            display: flex; align-items: center; gap: 12px;
            padding: 10px 20px;
            margin: 2px 10px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--sidebar-text);
            font-size: 13.5px; font-weight: 500;
            transition: all 0.2s ease;
            position: relative;
        }

        .nav-item:hover {
            background: rgba(37,99,235,0.12);
            color: #93c5fd;
        }

        .nav-item.active {
            background: linear-gradient(135deg, rgba(37,99,235,0.3), rgba(29,78,216,0.2));
            color: #ffffff;
            box-shadow: inset 0 0 0 1px rgba(96,165,250,0.2);
        }

        .nav-item.active::before {
            content: '';
            position: absolute;
            left: -10px; top: 50%;
            transform: translateY(-50%);
            width: 3px; height: 65%;
            background: #2563eb;
            border-radius: 0 3px 3px 0;
        }

        .nav-icon {
            width: 32px; height: 32px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 15px;
            background: rgba(255,255,255,0.05);
            flex-shrink: 0;
            transition: all 0.2s;
        }

        .nav-item:hover .nav-icon,
        .nav-item.active .nav-icon {
            background: rgba(37,99,235,0.3);
        }

        /* Sidebar Footer */
        .sidebar-footer {
            padding: 16px;
            border-top: 1px solid rgba(255,255,255,0.07);
        }

        .logout-btn {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 14px;
            border-radius: 10px;
            color: #f87171;
            font-size: 13.5px; font-weight: 500;
            transition: background 0.2s;
            cursor: pointer;
            width: 100%; border: none;
            background: rgba(239,68,68,0.08);
            text-align: left;
        }

        .logout-btn:hover {
            background: rgba(239,68,68,0.18);
        }

        /* Main Content */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: margin 0.3s;
        }

        /* Top Bar */
        .topbar {
            background: white;
            padding: 14px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 1px 4px rgba(0,0,0,0.04);
            position: sticky; top: 0; z-index: 50;
        }

        .topbar-title {
            font-size: 18px; font-weight: 700; color: #1e293b;
        }

        .topbar-right {
            display: flex; align-items: center; gap: 12px;
        }

        .topbar-time {
            font-size: 12px; color: #64748b;
        }

        /* Dashboard Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 18px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 22px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border: 1px solid rgba(226,232,240,0.8);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        }

        .stat-icon {
            width: 52px; height: 52px;
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .stat-icon-blue  { background: linear-gradient(135deg, #dbeafe, #bfdbfe); }
        .stat-icon-green { background: linear-gradient(135deg, #d1fae5, #a7f3d0); }
        .stat-icon-orange{ background: linear-gradient(135deg, #ffedd5, #fed7aa); }
        .stat-icon-purple{ background: linear-gradient(135deg, #ede9fe, #ddd6fe); }
        .stat-icon-red   { background: linear-gradient(135deg, #fee2e2, #fecaca); }

        .stat-number {
            font-size: 28px; font-weight: 800; color: #1e293b; line-height: 1;
        }

        .stat-label {
            font-size: 13px; color: #64748b; font-weight: 500; margin-top: 3px;
        }

        /* Content Area */
        .content-area { padding: 28px; }

        /* Menu Grid */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 16px;
            margin-top: 24px;
        }

        .menu-card {
            background: white;
            border-radius: 18px;
            padding: 24px;
            text-align: center;
            text-decoration: none;
            color: #1e293b;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            transition: all 0.25s ease;
            display: block;
            position: relative;
            overflow: hidden;
        }

        .menu-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: var(--card-accent);
        }

        .menu-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(37,99,235,0.12);
            border-color: var(--card-accent);
        }

        .menu-card-icon {
            font-size: 36px;
            margin-bottom: 12px;
            display: block;
        }

        .menu-card-title {
            font-size: 15px; font-weight: 700; color: #1e293b;
        }

        .menu-card-desc {
            font-size: 12px; color: #64748b; margin-top: 5px;
        }

        /* Section Header */
        .section-header {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: 16px; font-weight: 700; color: #1e293b;
        }

        .section-badge {
            font-size: 12px; padding: 3px 10px;
            border-radius: 20px;
            background: #eff6ff; color: #2563eb; font-weight: 600;
        }

        /* Responsive */
        .sidebar-overlay {
            display: none;
            position: fixed; inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 90;
        }

        .hamburger {
            display: none;
            background: none; border: none;
            font-size: 22px; cursor: pointer; color: #1e293b;
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .sidebar-overlay.open { display: block; }
            .main-wrapper { margin-left: 0; }
            .hamburger { display: block; }
            .content-area { padding: 16px; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
</head>
<body>

<!-- Sidebar Overlay (Mobile) -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <!-- Brand -->
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="sidebar-brand-logo">
            <div class="sidebar-brand-icon">S</div>
            <div class="sidebar-brand-text">
                <h1>SOLANG</h1>
                <p>Sistem Peminjaman Alat</p>
            </div>
        </a>
    </div>

    <!-- User Profile -->
    <div class="sidebar-user">
        <div class="user-avatar">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <div class="user-info" style="overflow: hidden;">
            <div class="user-name">{{ Auth::user()->name }}</div>
            <span class="user-badge badge-{{ Auth::user()->role }}">{{ ucfirst(Auth::user()->role) }}</span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="sidebar-nav">
        <!-- Umum -->
        <div class="nav-section-title">Umum</div>
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <div class="nav-icon">🏠</div>
            <span>Dashboard</span>
        </a>

        @if(Auth::user()->role == 'admin')
        <!-- Data Master -->
        <div class="nav-section-title">Data Master</div>
        <a href="{{ route('users.index') }}" class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <div class="nav-icon">👥</div>
            <span>Kelola User</span>
        </a>
        <a href="{{ route('categories.index') }}" class="nav-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
            <div class="nav-icon">🗂️</div>
            <span>Kategori</span>
        </a>
        <a href="{{ route('alats.index') }}" class="nav-item {{ request()->routeIs('alats.*') ? 'active' : '' }}">
            <div class="nav-icon">🔧</div>
            <span>Data Alat</span>
        </a>

        <!-- Transaksi -->
        <div class="nav-section-title">Transaksi</div>
        <a href="{{ route('peminjamans.index') }}" class="nav-item {{ request()->routeIs('peminjamans.*') ? 'active' : '' }}">
            <div class="nav-icon">📋</div>
            <span>Peminjaman</span>
        </a>
        <a href="{{ route('pengembalians.index') }}" class="nav-item {{ request()->routeIs('pengembalians.*') ? 'active' : '' }}">
            <div class="nav-icon">↩️</div>
            <span>Pengembalian</span>
        </a>

        <!-- Monitoring -->
        <div class="nav-section-title">Monitoring</div>
        <a href="{{ route('log-aktifitas.index') }}" class="nav-item {{ request()->routeIs('log-aktifitas.*') ? 'active' : '' }}">
            <div class="nav-icon">📊</div>
            <span>Log Aktivitas</span>
        </a>
        <a href="{{ route('laporans.index') }}" class="nav-item {{ request()->routeIs('laporans.*') ? 'active' : '' }}">
            <div class="nav-icon">📄</div>
            <span>Laporan</span>
        </a>

        @elseif(Auth::user()->role == 'petugas')
        <!-- Menu Petugas -->
        <div class="nav-section-title">Operasional</div>
        <a href="{{ route('peminjamans.index') }}" class="nav-item {{ request()->routeIs('peminjamans.*') ? 'active' : '' }}">
            <div class="nav-icon">✅</div>
            <span>Persetujuan Pinjam</span>
        </a>
        <a href="{{ route('pengembalians.index') }}" class="nav-item {{ request()->routeIs('pengembalians.*') ? 'active' : '' }}">
            <div class="nav-icon">🔄</div>
            <span>Monitor Kembali</span>
        </a>

        <!-- Laporan -->
        <div class="nav-section-title">Laporan</div>
        <a href="{{ route('laporans.index') }}" class="nav-item {{ request()->routeIs('laporans.*') ? 'active' : '' }}">
            <div class="nav-icon">🖨️</div>
            <span>Cetak Laporan</span>
        </a>

        @else
        <!-- Menu Peminjam -->
        <div class="nav-section-title">Menu Saya</div>
        <a href="{{ route('peminjamans.index') }}" class="nav-item {{ request()->routeIs('peminjamans.*') ? 'active' : '' }}">
            <div class="nav-icon">📋</div>
            <span>Riwayat Pinjam</span>
        </a>
        @endif
    </nav>

    <!-- Footer -->
    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <span>🚪</span>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</aside>

<!-- Main Content Wrapper -->
<div class="main-wrapper">
    <!-- Top Bar -->
    <div class="topbar">
        <div style="display: flex; align-items: center; gap: 14px;">
            <button class="hamburger" onclick="toggleSidebar()">☰</button>
            <div class="topbar-title">
                @isset($header)
                    {{ $header }}
                @else
                    Dashboard
                @endisset
            </div>
        </div>
        <div class="topbar-right">
            <div class="topbar-time" id="current-time"></div>
            <div style="width: 1px; height: 20px; background: #e2e8f0;"></div>
            <div style="font-size: 13px; color: #475569; font-weight: 500;">
                {{ ucfirst(Auth::user()->role) }}
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content-area">
        {{ $slot }}
    </div>
</div>

<script>
    // Toggle Sidebar on mobile
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('open');
        document.getElementById('sidebarOverlay').classList.toggle('open');
    }

    // Live clock
    function updateTime() {
        const now = new Date();
        const options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' };
        document.getElementById('current-time').textContent = now.toLocaleDateString('id-ID', options);
    }
    updateTime();
    setInterval(updateTime, 1000);
</script>
</body>
</html>
