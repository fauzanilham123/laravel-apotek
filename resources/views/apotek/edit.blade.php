<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="shortcut icon" href="{{ asset('storage/images/apoteker.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="md:flex">
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
                <h1 class="font-bold text-center">Edit Resep</h1>
            </div>
            <div class="ml-3">
                <form action="{{ route('resep.update', $recipes->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="justify-center items-start">
                        <div class="">
                            <div class="border-solid border-b-2 border-slate-400">
                                <label htmlFor="no">
                                    <h1 class="font-semibold">No Resep</h1>
                                    <input type="text" id="no" class="w-72 focus:outline-none"
                                        value="{{ old('no', $recipes->no) }}" placeholder="masukkan no_resep"
                                        name="no" required />
                                </label>
                            </div>
                            @error('no')
                                <div class="text-red-500">Nomor resep sudah digunakan </div>
                            @enderror
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="date">
                                    <h1 class="font-semibold">Tanggal</h1>
                                    <input type="date" id="date" class="w-72 focus:outline-none"
                                        value="{{ old('date', $recipes->date) }}" placeholder="masukkan " name="date"
                                        required />
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="nama_dokter">
                                    <h1 class="font-semibold">Nama Dokter</h1>
                                    <input type="text" id="nama_dokter" class="w-72 focus:outline-none"
                                        value="{{ old('nama_dokter', $recipes->nama_dokter) }}"
                                        placeholder="masukkan nama_dokter" name="nama_dokter" required />
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="nama_obat">
                                    <h1 class="font-semibold">Nama Obat</h1>
                                    <select id="nama_obat" class="w-72 focus:outline-none" name="id_obat" required>
                                        <option value="" disabled
                                            {{ old('id_obat', $selectedDrugId) ? '' : 'selected' }}>Pilih obat</option>
                                        @foreach ($drugs as $drug)
                                            <option value="{{ $drug->id }}"
                                                {{ old('id_obat', $selectedDrugId) == $drug->id ? 'selected' : '' }}>
                                                {{ $drug->nama_obat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>

                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="nama_pasien">
                                    <h1 class="font-semibold">Nama Pasien</h1>
                                    <input type="text" id="nama_pasien" class="w-72 focus:outline-none"
                                        value="{{ old('nama_pasien', $recipes->nama_pasien) }}"
                                        placeholder="masukkan nama_pasien" name="nama_pasien" required />
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="jumlah_obat">
                                    <h1 class="font-semibold">Jumlah Obat</h1>
                                    <input type="text" id="jumlah_obat" class="w-72 focus:outline-none"
                                        value="{{ old('jumlah_obat', $recipes->jumlah_obat) }}"
                                        placeholder="masukkan jumlah_obat" name="jumlah_obat" required />
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
