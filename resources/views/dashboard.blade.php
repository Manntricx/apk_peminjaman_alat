<x-solang-layout>
    <x-slot name="header">Dashboard</x-slot>

    @if(Auth::user()->role == 'admin')

    {{-- ============================================================ --}}
    {{-- ADMIN DASHBOARD --}}
    {{-- ============================================================ --}}

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon si-blue">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
            <div>
                <div class="stat-number">{{ \App\Models\User::count() }}</div>
                <div class="stat-label">Total User</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon si-green">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-green-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.83-5.83m0 0a2.978 2.978 0 0 1-4.074-4.074m4.074 4.074-5.438 5.437m0 0a2.978 2.978 0 0 1-4.074-4.074m4.074 4.074-5.438 5.437m0 0L2.123 4.75a.75.75 0 0 1 1.06-1.061l1.587 1.588m5.33 1.751c-.131-.232-.236-.477-.312-.733M19.75 4.75a.75.75 0 0 0-1.061 0L17.1 6.337m0 0a2.978 2.978 0 0 1-4.074 4.074m4.074-4.074-5.438 5.437m0 0a2.978 2.978 0 0 1-4.074-4.074m4.074 4.074-5.437 5.437m0 0L2.123 19.25a.75.75 0 0 0 1.06 1.061l1.587-1.588m5.33-1.751c-.131.232-.236.477-.312.733" />
                </svg>
            </div>
            <div>
                <div class="stat-number">{{ \App\Models\Alat::count() }}</div>
                <div class="stat-label">Total Alat</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon si-orange">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-amber-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 18 4.5h-1.5A2.25 2.25 0 0 0 14.25 6.75v10.5A2.25 2.25 0 0 0 16.5 19.5Zm-12 0h1.5A2.25 2.25 0 0 0 8.25 17.25V6.75A2.25 2.25 0 0 0 6 4.5H4.5A2.25 2.25 0 0 0 2.25 6.75v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                </svg>
            </div>
            <div>
                <div class="stat-number">{{ \App\Models\Peminjaman::count() }}</div>
                <div class="stat-label">Total Pinjaman</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon si-purple">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-purple-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-19.5 0A2.25 2.25 0 0 0 4.5 15h15a2.25 2.25 0 0 0 2.25-2.25m-19.5 0v.151c0 .654.312 1.264.856 1.648l.89.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89-.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89.63a2.25 2.25 0 0 0 1.326-.47V12.75" />
                </svg>
            </div>
            <div>
                <div class="stat-number">{{ \App\Models\Category::count() }}</div>
                <div class="stat-label">Kategori</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon si-red">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-red-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <div>
                <div class="stat-number">{{ \App\Models\Peminjaman::where('status','dipinjam')->count() }}</div>
                <div class="stat-label">Belum Kembali</div>
            </div>
        </div>
    </div>

    <!-- Quick Access Menu -->
    <div style="margin-top: 32px;">
        <div class="section-header">
            <div class="section-title">Akses Cepat — Admin</div>
            <span class="section-badge">6 Menu</span>
        </div>

        <div class="menu-grid">
            <a href="{{ route('users.index') }}" class="menu-card" style="--card-accent: #2563eb;">
                <span class="menu-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 mx-auto text-blue-600 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                </span>
                <div class="menu-card-title">Kelola User</div>
                <div class="menu-card-desc">Tambah, edit, hapus akun</div>
            </a>
            <a href="{{ route('categories.index') }}" class="menu-card" style="--card-accent: #7c3aed;">
                <span class="menu-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 mx-auto text-purple-600 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-19.5 0A2.25 2.25 0 0 0 4.5 15h15a2.25 2.25 0 0 0 2.25-2.25m-19.5 0v.151c0 .654.312 1.264.856 1.648l.89.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89-.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89-.63a2.25 2.25 0 0 0 2.547 0l.89-.63a2.25 2.25 0 0 1 2.547 0l.89-.63a2.25 2.25 0 0 0 1.326-.47V12.75" />
                    </svg>
                </span>
                <div class="menu-card-title">Kategori Alat</div>
                <div class="menu-card-desc">Kelola kategori inventaris</div>
            </a>
            <a href="{{ route('alats.index') }}" class="menu-card" style="--card-accent: #0891b2;">
                <span class="menu-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 mx-auto text-cyan-600 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.83-5.83m0 0a2.978 2.978 0 0 1-4.074-4.074m4.074 4.074-5.438 5.437m0 0a2.978 2.978 0 0 1-4.074-4.074m4.074 4.074-5.438 5.437m0 0L2.123 4.75a.75.75 0 0 1 1.06-1.061l1.587 1.588m5.33 1.751c-.131-.232-.236-.477-.312-.733M19.75 4.75a.75.75 0 0 0-1.061 0L17.1 6.337m0 0a2.978 2.978 0 0 1-4.074 4.074m4.074-4.074-5.438 5.437m0 0a2.978 2.978 0 0 1-4.074-4.074m4.074 4.074-5.437 5.437m0 0L2.123 19.25a.75.75 0 0 0 1.06 1.061l1.587-1.588m5.33-1.751c-.131.232-.236.477-.312.733" />
                    </svg>
                </span>
                <div class="menu-card-title">Data Alat</div>
                <div class="menu-card-desc">Kelola inventaris alat</div>
            </a>
            <a href="{{ route('peminjamans.index') }}" class="menu-card" style="--card-accent: #d97706;">
                <span class="menu-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 mx-auto text-amber-600 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 18 4.5h-1.5A2.25 2.25 0 0 0 14.25 6.75v10.5A2.25 2.25 0 0 0 16.5 19.5Zm-12 0h1.5A2.25 2.25 0 0 0 8.25 17.25V6.75A2.25 2.25 0 0 0 6 4.5H4.5A2.25 2.25 0 0 0 2.25 6.75v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                </span>
                <div class="menu-card-title">Data Peminjaman</div>
                <div class="menu-card-desc">Kelola seluruh transaksi</div>
            </a>
            <a href="{{ route('pengembalians.index') }}" class="menu-card" style="--card-accent: #16a34a;">
                <span class="menu-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 mx-auto text-green-600 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                    </svg>
                </span>
                <div class="menu-card-title">Pengembalian</div>
                <div class="menu-card-desc">Data alat yang dikembalikan</div>
            </a>
            <a href="{{ route('log-aktifitas.index') }}" class="menu-card" style="--card-accent: #dc2626;">
                <span class="menu-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 mx-auto text-red-600 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                    </svg>
                </span>
                <div class="menu-card-title">Log Aktivitas</div>
                <div class="menu-card-desc">Riwayat aktivitas sistem</div>
            </a>
        </div>
    </div>

    @elseif(Auth::user()->role == 'petugas')

    {{-- ============================================================ --}}
    {{-- PETUGAS DASHBOARD --}}
    {{-- ============================================================ --}}

    <!-- Stats Petugas -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon si-orange">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-amber-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <div>
                <div class="stat-number">{{ \App\Models\Peminjaman::where('status','menunggu')->count() }}</div>
                <div class="stat-label">Menunggu Persetujuan</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon si-blue">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 18 4.5h-1.5A2.25 2.25 0 0 0 14.25 6.75v10.5A2.25 2.25 0 0 0 16.5 19.5Zm-12 0h1.5A2.25 2.25 0 0 0 8.25 17.25V6.75A2.25 2.25 0 0 0 6 4.5H4.5A2.25 2.25 0 0 0 2.25 6.75v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                </svg>
            </div>
            <div>
                <div class="stat-number">{{ \App\Models\Peminjaman::where('status','dipinjam')->count() }}</div>
                <div class="stat-label">Sedang Dipinjam</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon si-green">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-green-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <div>
                <div class="stat-number">{{ \App\Models\Pengembalian::count() }}</div>
                <div class="stat-label">Total Dikembalikan</div>
            </div>
        </div>
    </div>

    <!-- Quick Access Petugas -->
    <div style="margin-top: 32px;">
        <div class="section-header">
            <div class="section-title">Akses Cepat — Petugas</div>
            <span class="section-badge">3 Menu</span>
        </div>

        <div class="menu-grid">
            <a href="{{ route('peminjamans.index') }}" class="menu-card" style="--card-accent: #2563eb;">
                <span class="menu-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mx-auto text-blue-600 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </span>
                <div class="menu-card-title">Setujui Peminjaman</div>
                <div class="menu-card-desc">Proses pengajuan dari peminjam</div>
            </a>
            <a href="{{ route('pengembalians.index') }}" class="menu-card" style="--card-accent: #16a34a;">
                <span class="menu-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mx-auto text-green-600 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </span>
                <div class="menu-card-title">Monitor Pengembalian</div>
                <div class="menu-card-desc">Pantau status pengembalian alat</div>
            </a>
            <a href="{{ route('laporans.index') }}" class="menu-card" style="--card-accent: #7c3aed;">
                <span class="menu-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mx-auto text-purple-600 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 19.106c.11.025.223.05.338.075a27.15 27.15 0 0 0 9.884 0c.115-.025.227-.05.338-.075m0-13.68c-.11-.025-.228-.05-.338-.075a27.15 27.15 0 0 0-9.884 0c-.115.025-.227.05-.338.075m10.56 13.68v1.896c0 .506-.312.969-.8 1.151l-.545.202a2.25 2.25 0 0 1-1.613 0l-.545-.202a1.125 1.125 0 0 0-1.128 0l-.545.202a2.25 2.25 0 0 1-1.613 0l-.545-.202a1.125 1.125 0 0 0-1.128 0l-.545.202a2.25 2.25 0 0 1-1.613 0l-.545-.202a1.125 1.125 0 0 0-.8-1.151V5.426m12 13.68v-4.5m-12 4.5v-4.5m12-4.506V3.882a2.25 2.25 0 0 0-1.711-2.185 27.42 27.42 0 0 0-8.578 0 2.25 2.25 0 0 0-1.711 2.185v1.538m12 0a2.25 2.25 0 0 1-2.25 2.25H6.75a2.25 2.25 0 0 1-2.25-2.25m12 0v4.5m-12-4.5v4.5m12 4.5h1.125c.621 0 1.125.504 1.125 1.125V21h-1.125m-14.625 0H2.25v-1.125c0-.621.504-1.125 1.125-1.125H4.5" />
                    </svg>
                </span>
                <div class="menu-card-title">Cetak Laporan</div>
                <div class="menu-card-desc">Buat dan cetak laporan periode</div>
            </a>
        </div>
    </div>

    @else

    {{-- ============================================================ --}}
    {{-- PEMINJAM DASHBOARD --}}
    {{-- ============================================================ --}}

    <div style="text-align:center; padding: 60px 20px;">
        <div style="width: 80px; height: 80px; background: #eff6ff; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-blue-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
            </svg>
        </div>
        <h2 style="font-size: 24px; font-weight: 800; color: #1e293b;">Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p style="color: #64748b; margin-top: 8px;">Silakan hubungi petugas untuk melakukan peminjaman alat.</p>
    </div>

    @endif

</x-solang-layout>
