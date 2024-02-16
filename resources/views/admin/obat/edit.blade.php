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
                <a href="{{ route('logout') }}">
                    <div
                        class="hidden md:block bg-white h-10 w-[280px] mx-auto rounded-md text-center leading-[40px] cursor-pointer active:bg-slate-400 mt-5">
                        Logout
                    </div>
                </a>
            </div>
        </div>
        <div class="mx-auto">
            <div class="mt-2 mb-3">
                <h1 class="font-bold text-center">Edit Obat</h1>
            </div>
            <div class="ml-3">
                <form action="{{ route('obat.update', $drugs->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="justify-center items-start">
                        <div class="">
                            <div class="border-solid border-b-2 border-slate-400">
                                <label htmlFor="kode">
                                    <h1 class="font-semibold">Kode obat</h1>
                                    <input type="text" id="kode" class="w-72 focus:outline-none"
                                        value="{{ old('kode_obat', $drugs->kode_obat) }}" placeholder="masukkan kode"
                                        name="kode" required />
                                </label>
                            </div>
                            @error('kode')
                                <div class="text-red-500">Kode obat sudah digunakan </div>
                            @enderror
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="nama">
                                    <h1 class="font-semibold">Nama Obat</h1>
                                    <input type="text" id="nama" class="w-72 focus:outline-none"
                                        value="{{ old('nama_obat', $drugs->nama_obat) }}" placeholder="masukkan nama"
                                        name="name" required />
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="expired_date">
                                    <h1 class="font-semibold">Expired Date</h1>
                                    <input type="date" id="expired_date" class="w-72 focus:outline-none"
                                        value="{{ old('expired_date', $drugs->expired_date) }}"
                                        placeholder="masukkan email" name="expired_date" required />
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="jumlah">
                                    <h1 class="font-semibold">Jumlah</h1>
                                    <input type="number" id="jumlah" class="w-72 focus:outline-none"
                                        value="{{ old('jumlah', $drugs->jumlah) }}" placeholder="masukkan ujumlah"
                                        name="jumlah" required />
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="harga">
                                    <h1 class="font-semibold">Harga Per Unit</h1>
                                    <input type="number" id="harga" class="w-72 focus:outline-none"
                                        value="{{ old('harga', $drugs->harga) }}" placeholder="masukkan harga"
                                        name="harga" required />
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
