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
                    @endforeach
                </tbody>
            </table>
            <div class="my-2 mx-auto">{{ $drugs->Links() }}</div>
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
