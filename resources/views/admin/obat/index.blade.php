@extends('layouts.app')

@section('content')
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
                                    placeholder="masukkan kode" name="kode_obat" value="{{ old('kode_obat') }}" required />
                            </label>
                        </div>
                        @error('kode_obat')
                            <div class="text-red-500">Kode obat sudah digunakan </div>
                        @enderror
                        <div class="mt-5 border-solid border-b-2 border-slate-400">
                            <label htmlFor="nama">
                                <h1 class="font-semibold">Nama Obat</h1>
                                <input type="text" id="nama" class="w-72 focus:outline-none"
                                    placeholder="masukkan nama" name="name" value="{{ old('name') }}" required />
                            </label>
                        </div>
                        <div class="mt-5 border-solid border-b-2 border-slate-400">
                            <label htmlFor="expired_date">
                                <h1 class="font-semibold">Expired Date</h1>
                                <input type="date" id="expired_date" class="w-72 focus:outline-none"
                                    placeholder="masukkan email" name="expired_date" value="{{ old('expired_date') }}"
                                    required />
                            </label>
                        </div>
                    </div>
                    <div class="h-52 bg-green-500 w-2 hidden md:block"></div>
                    <div class="md:ml-24 mr-24 md:mr-0">
                        <div class="border-solid border-b-2 border-slate-400">
                            <label htmlFor="jumlah">
                                <h1 class="font-semibold">Jumlah</h1>
                                <input type="number" id="jumlah" class="w-72 focus:outline-none"
                                    placeholder="masukkan ujumlah" name="jumlah" value="{{ old('jumlah') }}" required />
                            </label>
                        </div>
                        <div class="mt-5 border-solid border-b-2 border-slate-400">
                            <label htmlFor="harga">
                                <h1 class="font-semibold">Harga Per Unit</h1>
                                <input type="number" id="harga" class="w-72 focus:outline-none"
                                    placeholder="masukkan harga" name="harga" value="{{ old('harga') }}" required />
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
            <form action="" method="get">
                <label htmlFor="cari">
                    <h1 class="inline mr-2">Cari</h1>
                    <input type="text" class="focus:outline-none border-solid border-b-2 border-slate-400" id="cari"
                        name="cari" value="{{ request('cari') }}" />
                    <input type="button" value="">
                </label>
            </form>
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
                    @foreach ($drugs as $drug)
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
                                    onsubmit="return confirm('Apakah Anda Yakin ?');" class="flex">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('obat.edit', $drug->id) }}">
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
            <div class="my-2">{{ $drugs->Links('pagination::tailwind') }}</div>
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
@endsection
