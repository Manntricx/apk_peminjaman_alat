<x-solang-layout>
    <x-slot name="header">Kelola User</x-slot>

    <div style="background: white; border-radius: 16px; padding: 24px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <div>
                <h2 style="font-size: 18px; font-weight: 700; color: #1e293b; margin: 0;">Daftar Pengguna</h2>
                <p style="font-size: 13px; color: #64748b; margin-top: 2px;">Kelola semua akun admin, petugas, dan peminjam.</p>
            </div>
            <a href="{{ route('users.create') }}" style="background: #2563eb; color: white; padding: 10px 20px; border-radius: 10px; text-decoration: none; font-size: 14px; font-weight: 600; display: flex; align-items: center; gap: 8px; transition: background 0.2s;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 18px; height: 18px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah User
            </a>
        </div>

        @if(session('success'))
            <div style="background: #d1fae5; color: #065f46; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; display: flex; align-items: center; gap: 10px; border: 1px solid #a7f3d0;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 20px; height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: separate; border-spacing: 0; min-width: 800px;">
                <thead>
                    <tr>
                        <th style="padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 1px; border-bottom: 1px solid #e2e8f0; background: #f8fafc; border-radius: 8px 0 0 0;">Nama</th>
                        <th style="padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 1px; border-bottom: 1px solid #e2e8f0; background: #f8fafc;">Email</th>
                        <th style="padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 1px; border-bottom: 1px solid #e2e8f0; background: #f8fafc;">No. HP</th>
                        <th style="padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 1px; border-bottom: 1px solid #e2e8f0; background: #f8fafc;">Role</th>
                        <th style="padding: 12px 16px; text-align: center; font-size: 12px; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 1px; border-bottom: 1px solid #e2e8f0; background: #f8fafc; border-radius: 0 8px 0 0;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr style="transition: background 0.1s;">
                            <td style="padding: 16px; border-bottom: 1px solid #f1f5f9;">
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <div style="width: 36px; height: 36px; border-radius: 50%; background: linear-gradient(135deg, #2563eb, #6366f1); color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px;">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <span style="font-size: 14px; font-weight: 600; color: #1e293b;">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td style="padding: 16px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #475569;">{{ $user->email }}</td>
                            <td style="padding: 16px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #475569;">{{ $user->phone ?? '-' }}</td>
                            <td style="padding: 16px; border-bottom: 1px solid #f1f5f9;">
                                <span style="font-size: 11px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px; 
                                    {{ $user->role == 'admin' ? 'background: #eff6ff; color: #1d4ed8;' : ($user->role == 'petugas' ? 'background: #ecfdf5; color: #059669;' : 'background: #fffbeb; color: #d97706;') }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td style="padding: 16px; border-bottom: 1px solid #f1f5f9; text-align: center;">
                                <div style="display: flex; justify-content: center; gap: 8px;">
                                    <a href="{{ route('users.edit', $user->id) }}" style="padding: 6px; border-radius: 8px; border: 1px solid #e2e8f0; color: #64748b; transition: all 0.2s;" onmouseover="this.style.color='#2563eb'; this.style.borderColor='#2563eb'" onmouseout="this.style.color='#64748b'; this.style.borderColor='#e2e8f0'" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 18px; height: 18px;">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="padding: 6px; border-radius: 8px; border: 1px solid #e2e8f0; color: #64748b; transition: all 0.2s; cursor: pointer; background: none;" onmouseover="this.style.color='#dc2626'; this.style.borderColor='#dc2626'" onmouseout="this.style.color='#64748b'; this.style.borderColor='#e2e8f0'" title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 18px; height: 18px;">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-solang-layout>
