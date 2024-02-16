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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

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
                <h1 class="font-bold text-center">Kelola Obat</h1>
            </div>
            <div class="ml-3">
                <form action="{{ route('obat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="md:flex justify-center items-start">
                        <div class="md:mr-24 mr-24">
                            <div class="border-solid border-b-2 border-slate-400">
                                <label htmlFor="kode">
                                    <h1 class="font-semibold">Kode obat</h1>
                                    <input type="text" id="kode" class="w-72 focus:outline-none"
                                        placeholder="masukkan kode" name="kode_obat" value="{{ old('kode_obat') }}"
                                        required />
                                </label>
                            </div>
                            @error('kode_obat')
                                <div class="text-red-500">Kode obat sudah digunakan </div>
                            @enderror
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="nama">
                                    <h1 class="font-semibold">Nama Obat</h1>
                                    <input type="text" id="nama" class="w-72 focus:outline-none"
                                        placeholder="masukkan nama" name="name" value="{{ old('name') }}"
                                        required />
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="expired_date">
                                    <h1 class="font-semibold">Expired Date</h1>
                                    <input type="date" id="expired_date" class="w-72 focus:outline-none"
                                        placeholder="masukkan email" name="expired_date"
                                        value="{{ old('expired_date') }}" required />
                                </label>
                            </div>
                        </div>
                        <div class="h-52 bg-green-500 w-2 hidden md:block"></div>
                        <div class="md:ml-24 mr-24 md:mr-0">
                            <div class="border-solid border-b-2 border-slate-400">
                                <label htmlFor="jumlah">
                                    <h1 class="font-semibold">Jumlah</h1>
                                    <input type="number" id="jumlah" class="w-72 focus:outline-none"
                                        placeholder="masukkan ujumlah" name="jumlah" value="{{ old('jumlah') }}"
                                        required />
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="harga">
                                    <h1 class="font-semibold">Harga Per Unit</h1>
                                    <input type="number" id="harga" class="w-72 focus:outline-none"
                                        placeholder="masukkan harga" name="harga" value="{{ old('harga') }}"
                                        required />
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 md:ml-[70px]">
                        <input type="submit" value="Tambah"
                            class="bg-slate-300 p-1 border active:bg-slate-500 cursor-pointer rounded-md" />
                    </div>
                </form>
            </div>
            <div class="md:ml-[700px] mb-1 mt-3 md:mt-0">
                <h1 class="inline mr-2">Cari</h1>
                <input type="text" class="focus:outlsine-none border-solid border-b-2 border-slate-400" />
            </div>
            <div
                class="relative flex flex-col md:max-w-screen md:max-h-screen h-72 overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border ">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    @sortablelink('id')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    @sortablelink('kode_obat', 'Kode Obat')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    @sortablelink('nama_obat', 'Nama Obat')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    @sortablelink('expired_date', 'Expired Date')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    @sortablelink('jumlah', 'Jumlah')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    @sortablelink('harga', 'Harga')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    Aksi
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($drugs as $drug)
                            <tr>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $drug->id }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $drug->kode_obat }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $drug->nama_obat }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $drug->expired_date }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $drug->jumlah }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $drug->harga }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <form action="{{ route('obat.destroy', $drug->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda Yakin ?');">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('obat.edit', $drug->id) }}">
                                            <p
                                                class="inline font-sans text-sm antialiased font-normal leading-normal text-blue-700">
                                                Edit
                                            </p>
                                        </a>
                                        <button type="submit" href="#">
                                            <p
                                                class="inline font-sans text-sm antialiased font-normal leading-normal text-red-700">
                                                Hapus
                                            </p>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
                <div class="my-2 mx-auto">{{ $drugs->Links() }}</div>
            </div>
        </div>
    </div>
    <script>
        function removeDefault() {
            var select = document.getElementById("role");
            select.options[0].style.display = "none";
        }
    </script>
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
