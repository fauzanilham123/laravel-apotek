@extends('layouts.app')

@section('content')
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
                                    value="{{ old('expired_date', $drugs->expired_date) }}" placeholder="masukkan email"
                                    name="expired_date" required />
                            </label>
                        </div>
                        <div class="mt-5 border-solid border-b-2 border-slate-400">
                            <label htmlFor="jumlah">
                                <h1 class="font-semibold">Jumlah</h1>
                                <input type="number" id="jumlah" class="w-72 focus:outline-none"
                                    value="{{ old('jumlah', $drugs->jumlah) }}" placeholder="masukkan jumlah" name="jumlah"
                                    required />
                            </label>
                        </div>
                        <div class="mt-5 border-solid border-b-2 border-slate-400">
                            <label htmlFor="harga">
                                <h1 class="font-semibold">Harga Per Unit</h1>
                                <input type="number" id="harga" class="w-72 focus:outline-none"
                                    value="{{ old('harga', $drugs->harga) }}" placeholder="masukkan harga" name="harga"
                                    required />
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
