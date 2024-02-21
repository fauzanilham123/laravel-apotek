<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apoteker</title>
    <link rel="shortcut icon" href="{{ asset('storage/images/apoteker.png') }}" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite('resources/css/app.css')
</head>

<body>
    <div class="container md:flex bg-white">
        <div class="h-full w-full bg-black md:w-72 md:h-screen flex justify-center  md:block">
            <h1 class="text-white text-center p-2 md:pt-10 w-64 ml-16 md:ml-0">
                APOTEKER
            </h1>
            <div class="hidden md:w-36 md:flex md:mx-auto mt-5">
                <img src="{{ asset('storage/images/apoteker.png') }}" alt="apotek" />
            </div>
            <div class="text-white text-center mt-5 hidden md:block">
                <h1>
                    KELOLA <br />
                    RESEP
                </h1>
            </div>
            <a href="{{ route('logout') }}">
                <div
                    class="text-white w-[70px] p-1 bg-lime-600 md:mx-auto rounded-md border-2 border-solid border-white active:bg-lime-700 md:mt-52">
                    <h1>Log out</h1>
                </div>
            </a>
        </div>
        <div class="mx-auto">
            <div class="mt-2 mb-3">
                <h1 class="font-bold text-center">Kelola Resep</h1>
            </div>
            <div class="ml-3">
                <form action="{{ route('resep.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="md:flex justify-center items-start">
                        <div class="md:mr-24 mr-24">
                            <div class="border-solid border-b-2 border-slate-400">
                                <label htmlFor="no">
                                    <h1 class="font-semibold">No Resep</h1>
                                    <input type="text" id="no" class="w-72 focus:outline-none"
                                        placeholder="masukkan nomor resep" name="no" value="{{ old('no') }}"
                                        required />
                                </label>
                            </div>
                            @error('no')
                                <div class="text-red-500">Nomor resep sudah digunakan </div>
                            @enderror
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="tanggal">
                                    <h1 class="font-semibold">Tanggal</h1>
                                    <input type="date" id="tanggal" class="w-72 focus:outline-none"
                                        placeholder="masukkan tanggal" name="date" required
                                        value="{{ old('date') }}" />
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="nama_dokter">
                                    <h1 class="font-semibold">Nama Dokter</h1>
                                    <input type="text" id="nama_dokter" class="w-72 focus:outline-none"
                                        placeholder="masukkan nama dokter" name="nama_dokter" required
                                        value="{{ old('nama_dokter') }}" />
                                </label>
                            </div>
                        </div>
                        <div class="h-52 bg-green-500 w-2 hidden md:block"></div>
                        <div class="md:ml-24 mr-24 md:mr-0">
                            <div class="border-solid border-b-2 border-slate-400">
                                <label htmlFor="nama_obat">
                                    <h1 class="font-semibold">Nama Obat</h1>
                                    <select id="nama_obat" class="w-72 focus:outline-none" name="nama_obat" required>
                                        <option value="" disabled {{ old('nama_obat') ? '' : 'selected' }}>Pilih
                                            obat </option>
                                        @foreach ($drugs as $drug)
                                            <option value="{{ $drug->id }}"
                                                {{ old('nama_obat') == $drug->id ? 'selected' : '' }}>
                                                {{ $drug->nama_obat }}
                                            </option>
                                        @endforeach

                                    </select>
                                </label>
                            </div>
                            @if (session('kedaluwarsa'))
                                <div class="bg-red-500 text-white px-2 mt-2">
                                    {{ session('kedaluwarsa') }}
                                    <br>
                                    Pada tanggal: {{ session('expired_date') }}
                                </div>
                            @endif
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="nama_pasien">
                                    <h1 class="font-semibold">Nama Pasien</h1>
                                    <input type="text" id="nama_pasien" class="w-72 focus:outline-none"
                                        placeholder="masukkan nama pasien" name="nama_pasien"
                                        value="{{ old('nama_pasien') }}" required />
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="jumlah_obat">
                                    <h1 class="font-semibold">Jumlah Obat</h1>
                                    <input type="number" id="jumlah_obat" class="w-72 focus:outline-none"
                                        placeholder="masukkan jumlah obat" name="jumlah_obat" required
                                        value="{{ old('jumlah_obat') }}" />
                                </label>
                            </div>
                            @if (session('error'))
                                <div class="bg-red-500 text-white px-2 mt-2">
                                    {{ session('error') }}
                                    <br>
                                    Obat tersisa: {{ session('jumlah_obat_tersedia') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mt-2 md:ml-[70px]">
                        <input type="submit" value="Tambah"
                            class="bg-slate-300 p-1 border active:bg-slate-500 cursor-pointer rounded-md" />
                    </div>
                </form>
            </div>
            <div class="md:ml-[700px] mb-1 mt-3 md:mt-0 relative right-5">
                <form action="" method="get">
                    <label htmlFor="cari">
                        <h1 class="inline mr-2">Cari</h1>
                        <input type="text" class="focus:outline-none border-solid border-b-2 border-slate-400"
                            id="cari" name="cari" value="{{ request('cari') }}" />
                        <input type="submit" value="">
                    </label>
                </form>
            </div>
            <div
                class="relative flex flex-col md:max-w-screen md:max-h-screen h-72 overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    @sortablelink('id')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    @sortablelink('no', 'No Resep')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    @sortablelink('date', 'Tanggal')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    @sortablelink('nama_dokter', 'Nama Dokter')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    @sortablelink('id_obat', 'Nama Obat Dibeli')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    @sortablelink('nama_pasien', 'Nama Pasien')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    @sortablelink('jumlah_obat', 'Jumlah Obat')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    aksi
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recipes as $recipe)
                            <tr>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $recipe->id }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $recipe->no }}

                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $recipe->date }}

                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $recipe->nama_dokter }}

                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $recipe->obat->nama_obat }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $recipe->nama_pasien }}

                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $recipe->jumlah_obat }}

                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <form action="{{ route('resep.destroy', $recipe->id) }}" method="POST"
                                        class="flex" onsubmit="return confirm('Apakah Anda Yakin ?');">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('resep.edit', $recipe->id) }}">
                                            <svg class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                <line x1="16" y1="5" x2="19" y2="8" />
                                            </svg>
                                        </a>
                                        <button type="submit" href="#">
                                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6" />
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                <line x1="14" y1="11" x2="14" y2="17" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-2">{{ $recipes->appends(request()->except('page'))->Links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        //message with toastr
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @elseif (session()->has('kedaluwarsa'))
            toastr.error('{{ session('kedaluwarsa') }}', 'GAGAL!');
        @endif
    </script>
</body>

</html>
