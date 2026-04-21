@props(['header' => ''])

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
        * { font-family: 'Inter', sans-serif; box-sizing: border-box; }

        :root {
            --sidebar-bg: #0f172a;
            --sidebar-active: #1d4ed8;
            --sidebar-text: #94a3b8;
            --sidebar-width: 260px;
        }

        body { background: #f0f4ff; margin: 0; }

        /* ══════════════════════ SIDEBAR ══════════════════════ */
        .sidebar {
            position: fixed; top: 0; left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            display: flex; flex-direction: column;
            overflow-y: auto;
            z-index: 100;
            transition: transform 0.3s ease;
            scrollbar-width: thin;
            scrollbar-color: #1e3a8a transparent;
        }
        .sidebar::-webkit-scrollbar { width: 4px; }
        .sidebar::-webkit-scrollbar-thumb { background: #1e3a8a; border-radius: 10px; }

        /* Brand */
        .sidebar-brand {
            padding: 22px 18px 18px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            flex-shrink: 0;
        }
        .brand-logo { display: flex; align-items: center; gap: 11px; text-decoration: none; }
        .brand-icon {
            width: 42px; height: 42px;
            background: linear-gradient(135deg, #1d4ed8, #2563eb);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; font-weight: 900; color: #fff;
            box-shadow: 0 4px 14px rgba(37,99,235,0.45);
            flex-shrink: 0;
        }
        .brand-text h1 {
            font-size: 19px; font-weight: 800;
            background: linear-gradient(90deg, #60a5fa, #a5b4fc);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            letter-spacing: 2px; margin: 0;
        }
        .brand-text p {
            font-size: 9px; color: #475569; font-weight: 600;
            letter-spacing: 1.5px; text-transform: uppercase; margin: 2px 0 0;
        }

        /* User Info */
        .sidebar-user {
            margin: 14px 12px;
            padding: 11px 13px;
            background: rgba(255,255,255,0.04);
            border-radius: 12px;
            display: flex; align-items: center; gap: 10px;
            border: 1px solid rgba(255,255,255,0.06);
            flex-shrink: 0;
        }
        .user-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1d4ed8, #6d28d9);
            display: flex; align-items: center; justify-content: center;
            font-size: 15px; font-weight: 700; color: #fff; flex-shrink: 0;
        }
        .user-info { overflow: hidden; }
        .user-name { font-size: 13px; color: #e2e8f0; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .user-badge {
            font-size: 10px; font-weight: 700;
            padding: 1px 8px; border-radius: 20px;
            text-transform: uppercase; letter-spacing: 0.5px; display: inline-block; margin-top: 2px;
        }
        .badge-admin   { background: rgba(37,99,235,0.25);  color: #93c5fd; }
        .badge-petugas { background: rgba(16,185,129,0.2);  color: #6ee7b7; }
        .badge-peminjam{ background: rgba(245,158,11,0.2);  color: #fcd34d; }

        /* Nav */
        .sidebar-nav { padding: 6px 0; flex: 1; }
        .nav-section {
            font-size: 10px; font-weight: 700; color: #334155;
            text-transform: uppercase; letter-spacing: 1.5px;
            padding: 12px 20px 5px;
        }
        .nav-item {
            display: flex; align-items: center; gap: 11px;
            padding: 9px 20px; margin: 2px 10px;
            border-radius: 10px; text-decoration: none;
            color: #94a3b8; font-size: 13.5px; font-weight: 500;
            transition: all 0.2s ease; position: relative;
        }
        .nav-item:hover { background: rgba(37,99,235,0.12); color: #93c5fd; }
        .nav-item.active {
            background: linear-gradient(135deg, rgba(37,99,235,0.28), rgba(29,78,216,0.18));
            color: #ffffff;
            box-shadow: inset 0 0 0 1px rgba(96,165,250,0.18);
        }
        .nav-item.active::before {
            content: '';
            position: absolute; left: -10px; top: 50%;
            transform: translateY(-50%);
            width: 3px; height: 60%;
            background: #3b82f6; border-radius: 0 3px 3px 0;
        }
        .nav-icon {
            width: 30px; height: 30px; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px; background: rgba(255,255,255,0.05);
            flex-shrink: 0; transition: background 0.2s;
        }
        .nav-item:hover .nav-icon,
        .nav-item.active .nav-icon { background: rgba(37,99,235,0.3); }

        /* Footer */
        .sidebar-footer {
            padding: 14px; border-top: 1px solid rgba(255,255,255,0.06); flex-shrink: 0;
        }
        .logout-btn {
            display: flex; align-items: center; gap: 10px;
            padding: 9px 14px; border-radius: 10px;
            color: #f87171; font-size: 13.5px; font-weight: 500;
            background: rgba(239,68,68,0.08); border: none;
            cursor: pointer; width: 100%; transition: background 0.2s;
        }
        .logout-btn:hover { background: rgba(239,68,68,0.18); }

        /* ══════════════════════ MAIN ══════════════════════ */
        .main-wrapper { margin-left: var(--sidebar-width); min-height: 100vh; transition: margin 0.3s; }

        .topbar {
            background: #fff; padding: 13px 26px;
            display: flex; align-items: center; justify-content: space-between;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 1px 4px rgba(0,0,0,0.04);
            position: sticky; top: 0; z-index: 50;
        }
        .topbar-title { font-size: 17px; font-weight: 700; color: #1e293b; }
        .topbar-right { display: flex; align-items: center; gap: 12px; }
        .topbar-time { font-size: 12px; color: #64748b; }
        .topbar-divider { width: 1px; height: 20px; background: #e2e8f0; }
        .topbar-role { font-size: 12px; color: #475569; font-weight: 600; background: #eff6ff; padding: 3px 10px; border-radius: 20px; color: #1d4ed8; }

        .content-area { padding: 26px; }

        /* ══════════════════════ CARDS ══════════════════════ */
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(190px, 1fr)); gap: 16px; }

        .stat-card {
            background: #fff; border-radius: 16px; padding: 20px 22px;
            display: flex; align-items: center; gap: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            border: 1px solid rgba(226,232,240,0.9);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(0,0,0,0.09); }

        .stat-icon {
            width: 50px; height: 50px; border-radius: 13px;
            display: flex; align-items: center; justify-content: center; font-size: 22px; flex-shrink: 0;
        }
        .si-blue   { background: linear-gradient(135deg,#dbeafe,#bfdbfe); }
        .si-green  { background: linear-gradient(135deg,#d1fae5,#a7f3d0); }
        .si-orange { background: linear-gradient(135deg,#ffedd5,#fed7aa); }
        .si-purple { background: linear-gradient(135deg,#ede9fe,#ddd6fe); }
        .si-red    { background: linear-gradient(135deg,#fee2e2,#fecaca); }

        .stat-number { font-size: 28px; font-weight: 800; color: #1e293b; line-height: 1; }
        .stat-label  { font-size: 12.5px; color: #64748b; font-weight: 500; margin-top: 3px; }

        /* Menu Grid */
        .section-header { display: flex; align-items: center; justify-content: space-between; margin: 28px 0 14px; }
        .section-title  { font-size: 15px; font-weight: 700; color: #1e293b; }
        .section-badge  { font-size: 12px; padding: 3px 10px; border-radius: 20px; background: #eff6ff; color: #2563eb; font-weight: 600; }

        .menu-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 14px; }

        .menu-card {
            background: #fff; border-radius: 16px; padding: 22px;
            text-align: center; text-decoration: none; color: #1e293b;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 6px rgba(0,0,0,0.04);
            transition: all 0.25s ease; display: block; position: relative; overflow: hidden;
        }
        .menu-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0;
            height: 3px; background: var(--ca);
        }
        .menu-card:hover { transform: translateY(-4px); box-shadow: 0 14px 36px rgba(37,99,235,0.11); border-color: transparent; }
        .menu-card-icon { font-size: 38px; margin-bottom: 10px; display: block; }
        .menu-card-title { font-size: 14px; font-weight: 700; color: #1e293b; }
        .menu-card-desc  { font-size: 11.5px; color: #64748b; margin-top: 4px; }

        /* Overlay + Hamburger */
        .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 90; }
        .hamburger { display: none; background: none; border: none; font-size: 22px; cursor: pointer; color: #1e293b; padding: 0; }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .sidebar-overlay.open { display: block; }
            .main-wrapper { margin-left: 0; }
            .hamburger { display: block; }
            .content-area { padding: 14px; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
            .menu-grid  { grid-template-columns: repeat(2, 1fr); gap: 12px; }
        }
    </style>
</head>
<body>

<!-- Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<!-- ═══════════════════ SIDEBAR ═══════════════════ -->
<aside class="sidebar" id="sidebar">

    <!-- Brand -->
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="brand-logo">
            <div class="brand-icon">S</div>
            <div class="brand-text">
                <h1>SOLANG</h1>
                <p>Sistem Peminjaman Alat</p>
            </div>
        </a>
    </div>

    <!-- User Card -->
    <div class="sidebar-user">
        <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
        <div class="user-info">
            <div class="user-name">{{ Auth::user()->name }}</div>
            <span class="user-badge badge-{{ Auth::user()->role }}">{{ ucfirst(Auth::user()->role) }}</span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="sidebar-nav">
        <!-- Umum -->
        <div class="nav-section">Umum</div>
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <div class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
            </div>
            <span>Dashboard</span>
        </a>

        @if(Auth::user()->role == 'admin')

            <div class="nav-section">Data Master</div>
            <a href="{{ route('users.index') }}" class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                <div class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                </div>
                <span>Kelola User</span>
            </a>
            <a href="{{ route('categories.index') }}" class="nav-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <div class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-19.5 0A2.25 2.25 0 0 0 4.5 15h15a2.25 2.25 0 0 0 2.25-2.25m-19.5 0v.151c0 .654.312 1.264.856 1.648l.89.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89.63a2.25 2.25 0 0 0 1.326-.47V12.75" />
                    </svg>
                </div>
                <span>Kategori</span>
            </a>
            <a href="{{ route('alats.index') }}" class="nav-item {{ request()->routeIs('alats.*') ? 'active' : '' }}">
                <div class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.83-5.83m0 0a2.978 2.978 0 0 1-4.074-4.074m4.074 4.074-5.438 5.437m0 0a2.978 2.978 0 0 1-4.074-4.074m4.074 4.074-5.438 5.437m0 0L2.123 4.75a.75.75 0 0 1 1.06-1.061l1.587 1.588m5.33 1.751c-.131-.232-.236-.477-.312-.733M19.75 4.75a.75.75 0 0 0-1.061 0L17.1 6.337m0 0a2.978 2.978 0 0 1-4.074 4.074m4.074-4.074-5.438 5.437m0 0a2.978 2.978 0 0 1-4.074-4.074m4.074 4.074-5.437 5.437m0 0L2.123 19.25a.75.75 0 0 0 1.06 1.061l1.587-1.588m5.33-1.751c-.131.232-.236.477-.312.733" />
                    </svg>
                </div>
                <span>Data Alat</span>
            </a>

            <div class="nav-section">Transaksi</div>
            <a href="{{ route('peminjamans.index') }}" class="nav-item {{ request()->routeIs('peminjamans.*') ? 'active' : '' }}">
                <div class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 18 4.5h-1.5A2.25 2.25 0 0 0 14.25 6.75v10.5A2.25 2.25 0 0 0 16.5 19.5Zm-12 0h1.5A2.25 2.25 0 0 0 8.25 17.25V6.75A2.25 2.25 0 0 0 6 4.5H4.5A2.25 2.25 0 0 0 2.25 6.75v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                </div>
                <span>Peminjaman</span>
            </a>
            <a href="{{ route('pengembalians.index') }}" class="nav-item {{ request()->routeIs('pengembalians.*') ? 'active' : '' }}">
                <div class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                    </svg>
                </div>
                <span>Pengembalian</span>
            </a>

            <div class="nav-section">Monitoring</div>
            <a href="{{ route('log-aktifitas.index') }}" class="nav-item {{ request()->routeIs('log-aktifitas.*') ? 'active' : '' }}">
                <div class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                    </svg>
                </div>
                <span>Log Aktivitas</span>
            </a>
            <a href="{{ route('laporans.index') }}" class="nav-item {{ request()->routeIs('laporans.*') ? 'active' : '' }}">
                <div class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                </div>
                <span>Laporan</span>
            </a>

        @elseif(Auth::user()->role == 'petugas')

            <div class="nav-section">Operasional</div>
            <a href="{{ route('peminjamans.index') }}" class="nav-item {{ request()->routeIs('peminjamans.*') ? 'active' : '' }}">
                <div class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <span>Persetujuan Pinjam</span>
            </a>
            <a href="{{ route('pengembalians.index') }}" class="nav-item {{ request()->routeIs('pengembalians.*') ? 'active' : '' }}">
                <div class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </div>
                <span>Monitor Kembali</span>
            </a>

            <div class="nav-section">Laporan</div>
            <a href="{{ route('laporans.index') }}" class="nav-item {{ request()->routeIs('laporans.*') ? 'active' : '' }}">
                <div class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 19.106c.11.025.223.05.338.075a27.15 27.15 0 0 0 9.884 0c.115-.025.227-.05.338-.075m0-13.68c-.11-.025-.228-.05-.338-.075a27.15 27.15 0 0 0-9.884 0c-.115.025-.227.05-.338.075m10.56 13.68v1.896c0 .506-.312.969-.8 1.151l-.545.202a2.25 2.25 0 0 1-1.613 0l-.545-.202a1.125 1.125 0 0 0-1.128 0l-.545.202a2.25 2.25 0 0 1-1.613 0l-.545-.202a1.125 1.125 0 0 0-1.128 0l-.545.202a2.25 2.25 0 0 1-1.613 0l-.545-.202a1.125 1.125 0 0 0-.8-1.151V5.426m12 13.68v-4.5m-12 4.5v-4.5m12-4.506V3.882a2.25 2.25 0 0 0-1.711-2.185 27.42 27.42 0 0 0-8.578 0 2.25 2.25 0 0 0-1.711 2.185v1.538m12 0a2.25 2.25 0 0 1-2.25 2.25H6.75a2.25 2.25 0 0 1-2.25-2.25m12 0v4.5m-12-4.5v4.5m12 4.5h1.125c.621 0 1.125.504 1.125 1.125V21h-1.125m-14.625 0H2.25v-1.125c0-.621.504-1.125 1.125-1.125H4.5" />
                    </svg>
                </div>
                <span>Cetak Laporan</span>
            </a>

        @else
            <div class="nav-section">Menu Saya</div>
            <a href="{{ route('peminjamans.index') }}" class="nav-item {{ request()->routeIs('peminjamans.*') ? 'active' : '' }}">
                <div class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <span>Riwayat Pinjam</span>
            </a>
        @endif
    </nav>

    <!-- Footer -->
    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                </svg>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</aside>

<!-- ═══════════════════ MAIN ═══════════════════ -->
<div class="main-wrapper">
    <!-- Top Bar -->
    <div class="topbar">
        <div style="display:flex; align-items: center; gap: 13px;">
            <button class="hamburger" onclick="toggleSidebar()">☰</button>
            <div class="topbar-title">
                {{ $header ?? 'Dashboard' }}
            </div>
        </div>
        <div class="topbar-right">
            <div class="topbar-time" id="current-time"></div>
            <div class="topbar-divider"></div>
            <div class="topbar-role">{{ ucfirst(Auth::user()->role) }}</div>
        </div>
    </div>

    <!-- Content -->
    <div class="content-area">
        {{ $slot }}
    </div>
</div>

<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('sidebarOverlay').classList.toggle('open');
}
function updateTime() {
    const now = new Date();
    document.getElementById('current-time').textContent =
        now.toLocaleDateString('id-ID', { weekday:'short', year:'numeric', month:'short', day:'numeric', hour:'2-digit', minute:'2-digit' });
}
updateTime(); setInterval(updateTime, 1000);
</script>
</body>
</html>
