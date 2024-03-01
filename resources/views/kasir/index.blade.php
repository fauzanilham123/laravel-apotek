<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kasir</title>
    <link rel="shortcut icon" href="storage/images/kasir.png" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite('resources/css/app.css')
</head>

<body>
    <div class="container md:flex bg-white">
        <div class="h-full w-full bg-black md:w-72 md:h-[1000px] flex justify-center  md:block">
            <h1 class="text-white text-center p-2 md:pt-10 w-64 ml-16 md:ml-0">
                KASIR
            </h1>
            <div class="hidden md:w-52 md:flex md:mx-auto mt-2">
                <img src="storage/images/kasir.png" alt="apotek" />
            </div>
            <div class="text-white text-center mt-2 hidden md:block">
                <h1>
                    KELOLA <br />
                    TRANSAKSI
                </h1>
            </div>
            <a href="{{ route('logout') }}">
                <div
                    class="w-[70px] p-1 bg-white md:mx-auto rounded-md border-2 border-solid active:bg-slate-300 md:mt-52">
                    <h1>Log out</h1>
                </div>
            </a>
        </div>
        <div class="w-full">
            <div class="mt-2 mb-3">
                <h1 class="font-bold text-center">Form Transaksi</h1>
            </div>
            <div class="ml-3">
                <form action="{{ route('kasir.store') }}" method="POST">
                    @csrf
                    <div class="md:flex justify-center items-start">
                        <div class="md:mr-24 mr-24">
                            <div class="border-solid border-b-2 border-slate-400">
                                <label htmlFor="nama">
                                    <h1 class="font-semibold">No Resep</h1>
                                    <select id="nama" class="w-72 focus:outline-none" name="no" required
                                        onchange="populateForm()">
                                        <option value="" disabled selected>Pilih No Resep</option>
                                        @forelse ($recipe as $resep)
                                            <option value="{{ $resep->id }}">{{ $resep->no }}</option>
                                        @empty
                                            <option value="" disabled>Tidak ada resep yang belum dibayar</option>
                                        @endforelse
                                    </select>
                                </label>
                            </div>
                            <div class="mt-2 border-solid border-b-2 border-slate-400">
                                <label htmlFor="date">
                                    <h1 class="font-semibold">Tanggal Resep</h1>
                                    <input type="date" id="date" class="w-72 focus:outline-none" readonly />
                                </label>
                            </div>
                            <div class="mt-2 border-solid border-b-2 border-slate-400">
                                <label htmlFor="name">
                                    <h1 class="font-semibold">Nama Pasien</h1>
                                    <input type="text" id="name" class="w-72 focus:outline-none" readonly />
                                </label>
                            </div>
                            <div class="mt-2 border-solid border-b-2 border-slate-400">
                                <label htmlFor="nama_dokter">
                                    <h1 class="font-semibold">Nama Dokter</h1>
                                    <input type="text" id="nama_dokter" class="w-72 focus:outline-none" readonly />
                                </label>
                            </div>
                        </div>
                        <div class="h-60 bg-green-500 w-2 hidden md:block"></div>
                        <div class="md:ml-24 mr-24 md:mr-0">
                            <div class="border-solid border-b-2 border-slate-400">
                                <label htmlFor="nama_obat">
                                    <h1 class="font-semibold">Nama Obat</h1>
                                    <input type="text" id="nama_obat" class="w-72 focus:outline-none" readonly />
                                </label>
                            </div>
                            <div class="mt-2 border-solid border-b-2 border-slate-400">
                                <label htmlFor="harga">
                                    <h1 class="font-semibold">Harga</h1>
                                    <input type="text" id="harga" class="w-72 focus:outline-none"
                                        name="total_bayar" required readonly />
                                </label>
                            </div>
                            <div class="mt-2 border-solid border-b-2 border-slate-400">
                                <label htmlFor="quantity">
                                    <h1 class="font-semibold">Quantity</h1>
                                    <input type="text" id="quantity" class="w-72 focus:outline-none" readonly />
                                </label>
                            </div>
                            <div class="mt-2 border-solid border-b-2 border-slate-400 hidden">
                                <label htmlFor="id_drug">
                                    <h1 class="font-semibold">id_drug</h1>
                                    <input type="number" id="id_drug" class="w-72 focus:outline-none" name="id_drug"
                                        readonly />
                                </label>
                            </div>
                            <div class="mt-2 border-solid border-b-2 border-slate-400 hidden">
                                <label htmlFor="id_recipe">
                                    <h1 class="font-semibold">id_recipe</h1>
                                    <input type="number" id="id_recipe" class="w-72 focus:outline-none"
                                        name="id_recipe" readonly />
                                </label>
                            </div>
                            <div class="mt-2 border-solid border-b-2 border-slate-400 hidden">
                                <label htmlFor="id_recipe">
                                    <h1 class="font-semibold">no_resep</h1>
                                    <input type="text" id="no_resep" class="w-72 focus:outline-none"
                                        name="no_resep" readonly />
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 md:ml-28">
                        <input type="submit" value="Tambah"
                            class="bg-slate-300 p-1 border active:bg-slate-500 cursor-pointer rounded-md" />
                    </div>
                </form>
                <div class="md:ml-[700px] mb-1 mt-3 md:mt-0">
                    <form action="" method="get">
                        <label htmlFor="cari">
                            <h1 class="inline mr-2">Cari</h1>
                            <input type="text" class="focus:outline-none border-solid border-b-2 border-slate-400"
                                id="cari" name="cari" value="{{ request('cari') }}" />
                            <input type="submit" value="">
                        </label>
                    </form>
                </div>
            </div>
            <div
                class="relative flex flex-col md:w-[950px] h-72 overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border mx-auto">
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
                                    Aksi
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
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        @if ($recipe->transaksi == 0)
                                            <p
                                                class="block font-sans text-sm antialiased font-normal leading-normal text-red-500">
                                                Belum di bayar
                                            </p>
                                        @else
                                            <a href="{{ route('cetak-struk', ['recipeId' => $recipe->id]) }}"
                                                target="_blank">
                                                <button
                                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded flex">
                                                    <svg class="h-5 w-5 text-white mr-2" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" />
                                                        <path
                                                            d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                                        <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                                        <rect x="7" y="13" width="10" height="8"
                                                            rx="2" />
                                                    </svg>Cetak Struk</button>
                                            </a>
                                        @endif
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-2">{{ $recipes->appends(request()->except('page'))->Links('pagination::tailwind') }}
                </div>
            </div>
            <div id="kasir" class="mt-3 ml-28 hidden">
                <h1 class="inline">Total bayar : </h1>
                <h1 id="bayar" class="inline"></h1>
                <div class="mt-3 flex">
                    <button type="button" onclick="hitungKembali()"
                        class="rounded-md bg-slate-200 active:border-slate-600 p-1 w-min cursor-pointer"> Bayar
                    </button>
                    <input type="number" id="inputBayar"
                        class="ml-3 focus:outline-none border-solid border-b-2 border-slate-400 " />
                </div>
                <div class="mt-3 flex">
                    <p class="" id="kembali"></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        function populateForm() {
            var selectedRecipeId = document.getElementById('nama').value;

            // Kirim permintaan ke server untuk mendapatkan data resep
            fetch('/get-recipe/' + selectedRecipeId)
                .then(response => response.json())
                .then(data => {
                    $harga = data.obat.harga * data.jumlah_obat
                    // Mengisi nilai formulir dengan data resep yang diterima
                    document.getElementById('date').value = data.date;
                    document.getElementById('name').value = data.nama_pasien;
                    document.getElementById('nama_dokter').value = data.nama_dokter;
                    document.getElementById('nama_obat').value = data.obat.nama_obat;
                    document.getElementById('harga').value = "Rp" + $harga;
                    document.getElementById('bayar').innerText = $harga;
                    document.getElementById('quantity').value = data.jumlah_obat;
                    document.getElementById('id_recipe').value = data.id;
                    document.getElementById('id_drug').value = data.obat.id;
                    document.getElementById('no_resep').value = data.no_resep;
                });

            document.getElementById('kasir').style.display = 'block';

        }

        function hitungKembali() {
            // Mengubah nilai pada elemen dengan id 'bayar'
            let totalBelanja = parseFloat(document.getElementById('bayar').innerText);

            // Mendapatkan nilai yang diinputkan
            let bayar = parseFloat(document.getElementById('inputBayar').value);

            // Contoh penghitungan kembalian (Anda dapat menyesuaikan sesuai kebutuhan)
            let kembalian = bayar - totalBelanja;

            if (kembalian === 0) {
                document.getElementById('kembali').innerText = "Uang Pas";
            } else if (kembalian > 0) {
                document.getElementById('kembali').innerText = "Kembalian: " + formatAngka(kembalian);
            } else {
                // Jika kembalian kurang dari 0
                document.getElementById('kembali').innerText = "Uang Kurang: " + formatAngka(-kembalian);
            }
        }

        // Fungsi untuk memformat angka dengan pemisah ribuan
        function formatAngka(angka) {
            return angka.toLocaleString('id-ID');
        }

        function hapusFormatAngka(angkaFormatted) {
            // Menghapus tanda baca dan spasi dari angka yang diformat
            return angkaFormatted.replace(/\D/g, '');
        }
    </script>
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
        @endif
    </script>
</body>

</html>
