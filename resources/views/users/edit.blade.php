<x-solang-layout>
    <x-slot name="header">Edit User</x-slot>

    <div style="max-width: 600px; margin: 0 auto;">
        <div style="background: white; border-radius: 16px; padding: 32px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
            <div style="margin-bottom: 24px;">
                <h2 style="font-size: 20px; font-weight: 700; color: #1e293b; margin: 0;">Update Data User</h2>
                <p style="font-size: 14px; color: #64748b; margin-top: 4px;">Perbarui informasi akun <strong>{{ $user->name }}</strong>.</p>
            </div>

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Nama -->
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 14px; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
                    @error('name')<p style="color: #dc2626; font-size: 12px; margin-top: 4px;">{{ $message }}</p>@enderror
                </div>

                <!-- Email -->
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 14px; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
                    @error('email')<p style="color: #dc2626; font-size: 12px; margin-top: 4px;">{{ $message }}</p>@enderror
                </div>

                <!-- Phone -->
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;">No. WhatsApp / Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 14px; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
                    @error('phone')<p style="color: #dc2626; font-size: 12px; margin-top: 4px;">{{ $message }}</p>@enderror
                </div>

                <!-- Role -->
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;">Pilih Role</label>
                    <select name="role" required style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 14px; outline: none; background: white; transition: border-color 0.2s;" onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
                        <option value="peminjam" {{ $user->role == 'peminjam' ? 'selected' : '' }}>Peminjam (Siswa/Mahasiswa)</option>
                        <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas (Staff Inventaris)</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrator</option>
                    </select>
                    @error('role')<p style="color: #dc2626; font-size: 12px; margin-top: 4px;">{{ $message }}</p>@enderror
                </div>

                <div style="margin-top: 32px; padding-top: 20px; border-top: 1px solid #f1f5f9; margin-bottom: 24px;">
                    <p style="font-size: 13px; font-weight: 700; color: #1e293b; margin-bottom: 4px;">Ubah Password</p>
                    <p style="font-size: 12px; color: #64748b; margin-bottom: 16px;">Kosongkan jika tidak ingin mengubah password.</p>

                    <!-- Password -->
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;">Password Baru</label>
                        <input type="password" name="password" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 14px; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 14px; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
                    </div>
                </div>

                <div style="display: flex; gap: 12px;">
                    <button type="submit" style="flex: 1; background: #2563eb; color: white; padding: 12px; border-radius: 10px; border: none; font-size: 14px; font-weight: 700; cursor: pointer; transition: background 0.2s;" onmouseover="this.style.background='#1d4ed8'" onmouseout="this.style.background='#2563eb'">Simpan Perubahan</button>
                    <a href="{{ route('users.index') }}" style="flex: 1; text-align: center; background: #f1f5f9; color: #475569; padding: 12px; border-radius: 10px; border: none; font-size: 14px; font-weight: 700; text-decoration: none; transition: background 0.2s;" onmouseover="this.style.background='#e2e8f0'" onmouseout="this.style.background='#f1f5f9'">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-solang-layout>
