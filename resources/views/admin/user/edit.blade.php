<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="shortcut icon" href="{{ asset('storage/images/icon_admin.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="md:flex">
        <div>
            <div
                class="bg-black flex w-full h-10 text-white mx-auto justify-between items-center md:h-screen md:w-72 md:mx-0 md:block md:text-black">
                <div class="w-10 md:w-36 md:mx-auto pt-10">
                    <img src="{{ asset('storage/images/icon_admin.png') }}" alt="" />
                </div>
                <div class="flex md:hidden">
                    <ul class="flex space-x-2">
                        <a href="/user">
                            <li>Kelola User</li>
                        </a>
                        <a href="/obat">
                            <li>Kelola Obat</li>
                        </a>
                        <a href="/laporan">
                            <li>Kelola Laporan</li>
                        </a>
                    </ul>
                </div>
                <a href="/user">
                    <div
                        class="hidden md:block bg-white h-10 w-[280px] mx-auto rounded-md text-center leading-[40px] cursor-pointer active:bg-slate-400 mt-10">
                        Kelola User
                    </div>
                </a>
                <a href="/obat">
                    <div
                        class="hidden md:block bg-white h-10 w-[280px] mx-auto rounded-md text-center leading-[40px] cursor-pointer active:bg-slate-400 mt-5">
                        Kelola Obat
                    </div>
                </a>
                <a href="/laporan">
                    <div
                        class="hidden md:block bg-white h-10 w-[280px] mx-auto rounded-md text-center leading-[40px] cursor-pointer active:bg-slate-400 mt-5">
                        Kelola Laporan
                    </div>
                </a>
                <a href="#">
                    <div
                        class="hidden md:block bg-white h-10 w-[280px] mx-auto rounded-md text-center leading-[40px] cursor-pointer active:bg-slate-400 mt-5">
                        Logout
                    </div>
                </a>
            </div>
        </div>
        <div class="mx-auto">
            <div class="mt-2 mb-3">
                <h1 class="font-bold text-center">Edit User</h1>
            </div>
            <div class="ml-3">
                <form action="{{ route('user.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="justify-center items-start">
                        <div class="">
                            <div class="border-solid border-b-2 border-slate-400">
                                <label htmlFor="role">
                                    <h1 class="font-semibold">Role</h1>
                                    <select id="role" class="w-72 focus:outline-none" name="role" required>
                                        <option value="admin" {{ $users->role == 'admin' ? 'selected' : '' }}>Admin
                                        </option>

                                        <option value="apoteker" {{ $users->role == 'apoteker' ? 'selected' : '' }}>
                                            Apoteker</option>

                                        <option value="kasir" {{ $users->role == 'kasir' ? 'selected' : '' }}>Kasir
                                        </option>

                                    </select>
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="nama">
                                    <h1 class="font-semibold">Nama</h1>
                                    <input type="text" id="nama" class="w-72 focus:outline-none"
                                        value="{{ old('name', $users->name) }}" placeholder="masukkan nama"
                                        name="name" required />
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="telepon">
                                    <h1 class="font-semibold">Telepon</h1>
                                    <input type="number" id="telepon" class="w-72 focus:outline-none"
                                        value="{{ old('telepon', $users->telepon) }}" placeholder="masukkan email"
                                        name="telepon" required pattern="\d*" />
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="alamat">
                                    <h1 class="font-semibold">Alamat</h1>
                                    <input type="text" id="alamat" class="w-72 focus:outline-none"
                                        value="{{ old('alamat', $users->alamat) }}" placeholder="masukkan ujumlah"
                                        name="alamat" required />
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="username">
                                    <h1 class="font-semibold">Username</h1>
                                    <input type="text" id="username" class="w-72 focus:outline-none"
                                        value="{{ old('username', $users->username) }}" placeholder="masukkan username"
                                        name="username" required />
                                </label>
                            </div>
                            @error('username')
                                <div class="text-red-500">username sudah digunakan </div>
                            @enderror
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="password">
                                    <h1 class="font-semibold">Password</h1>
                                    <input type="text" id="password" class="w-72 focus:outline-none" value=""
                                        placeholder="masukkan password" name="password" />
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="mt-3">
                        <input type="submit" value="Simpan"
                            class="bg-slate-300 p-1 border active:bg-slate-500 cursor-pointer rounded-md" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>
<script>
    //message with toastr
    @if (session()->has('success'))

        toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif (session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
</script>
