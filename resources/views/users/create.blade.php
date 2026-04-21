<x-solang-layout>
    <x-slot name="header">Tambah User</x-slot>

    <div style="max-width: 600px; margin: 0 auto;">
        <div
            style="background: white; border-radius: 16px; padding: 32px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
            <div style="margin-bottom: 24px;">
                <h2 style="font-size: 20px; font-weight: 700; color: #1e293b; margin: 0;">Buat Akun Baru</h2>
                <p style="font-size: 14px; color: #64748b; margin-top: 4px;">Isi data di bawah untuk mendaftarkan
                    pengguna baru ke sistem.</p>
            </div>

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <!-- Nama -->
                <div style="margin-bottom: 20px;">
                    <label
                        style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;">Nama
                        Lengkap</label>
                    <input type="text" name="name" required
                        style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 14px; outline: none; transition: border-color 0.2s;"
                        onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'"
                        placeholder="Contoh: John Doe">
                    @error('name')<p style="color: #dc2626; font-size: 12px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div style="margin-bottom: 20px;">
                    <label
                        style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;">Alamat
                        Email</label>
                    <input type="email" name="email" required
                        style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 14px; outline: none; transition: border-color 0.2s;"
                        onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'"
                        placeholder="john@example.com">
                    @error('email')<p style="color: #dc2626; font-size: 12px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div style="margin-bottom: 20px;">
                    <label
                        style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;">No.
                        WhatsApp / Telepon</label>
                    <input type="text" name="phone"
                        style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 14px; outline: none; transition: border-color 0.2s;"
                        onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'"
                        placeholder="0812xxxxxx">
                    @error('phone')<p style="color: #dc2626; font-size: 12px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div style="margin-bottom: 20px;">
                    <label
                        style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;">Pilih
                        Role</label>
                    <select name="role" required
                        style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 14px; outline: none; background: white; transition: border-color 0.2s;"
                        onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
                        <option value="peminjam">Peminjam</option>
                        <option value="petugas">Petugas</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role')<p style="color: #dc2626; font-size: 12px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div style="margin-bottom: 20px;">
                    <label
                        style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;">Password</label>
                    <input type="password" name="password" required
                        style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 14px; outline: none; transition: border-color 0.2s;"
                        onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
                    @error('password')<p style="color: #dc2626; font-size: 12px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div style="margin-bottom: 32px;">
                    <label
                        style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;">Konfirmasi
                        Password</label>
                    <input type="password" name="password_confirmation" required
                        style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 14px; outline: none; transition: border-color 0.2s;"
                        onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
                </div>

                <div style="display: flex; gap: 12px;">
                    <button type="submit"
                        style="flex: 1; background: #2563eb; color: white; padding: 12px; border-radius: 10px; border: none; font-size: 14px; font-weight: 700; cursor: pointer; transition: background 0.2s;"
                        onmouseover="this.style.background='#1d4ed8'"
                        onmouseout="this.style.background='#2563eb'">Simpan User</button>
                    <a href="{{ route('users.index') }}"
                        style="flex: 1; text-align: center; background: #f1f5f9; color: #475569; padding: 12px; border-radius: 10px; border: none; font-size: 14px; font-weight: 700; text-decoration: none; transition: background 0.2s;"
                        onmouseover="this.style.background='#e2e8f0'"
                        onmouseout="this.style.background='#f1f5f9'">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-solang-layout>