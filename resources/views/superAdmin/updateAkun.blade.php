<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Akun</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/akun.css">
    </head>
    <body>
        <div class="header">
            <div class="logo">
                <img src="/assets/images/LogoNew.png" alt="Logo">
            </div>
            <div class="content-header">
                <div class="user-info">
                    <div class="user-details">
                        <div class="user-name">Zhofar Putra</div>
                        <div class="user-role">Super Admin</div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" style="border: none; background: none; padding: 0;">
                            <img src="/assets/images/LogOut.png" alt="logout" style="width: 30px; height: 30px;">
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="isi-deskripsi">
            <button class="isi-kembali"><a href="{{ route('account_management') }}" style="text-decoration: none;color: white;">Kembali</button></a>
            <div class="isi-judul">
                <h2>Update Akun</h2>
            </div>
            <form action="{{ route('update_account', ['id'=>$admin->id]) }}" method="post">
                @csrf
                @method('put')
                <div class="container-up-akun">
                    <div class="form-container-akun">
                        <!-- Section 1: Kode dan Nama Barang -->
                        <div class="form-section">
                            <div class="form-field-akun">
                                <label for="brand">Update Nama</label>
                                <input type="nama" id="nama" name="name" value="{{ $admin->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-section">
                            <div class="form-field-akun">
                                <label for="brand">Update Username</label>
                                <input type="username" id="username" name="username" value="{{ $admin->username }}">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-section">
                            <div class="form-field-akun">
                                <label for="type">Update Email</label>
                                <input type="email" id="email" name="email" value="{{ $admin->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-section">
                            <div class="form-field-akun">
                                <label for="name">Update Kata Sandi</label>
                                <input type="katasandi" id="katasandi" name="password" >
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-section">
                            <div class="form-field-akun">
                                <label for="rolesid">Update Roles</label>
                                <select name="role" >
                                    <option value="option_select" disabled selected> Pilih role untuk akun </option>

                                        <option value="superAdmin">Super Admin</option>
                                        <option value="admin">Admin</option>

                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-section">
                            <button class="save-button">Simpan</button>
                        </div>
                    </div>
            </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
