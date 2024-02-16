<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kasir</title>
    <link rel="shortcut icon" href="storage/images/kasir.png" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


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
                                    <select id="nama" class="w-72 focus:outline-none" name="no_resep" required
                                        onchange="populateForm()">
                                        <option value="" disabled selected>Pilih No Resep</option>
                                        @foreach ($recipes as $resep)
                                            <option value="{{ $resep->id }}">{{ $resep->no }}</option>
                                        @endforeach
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
                        </div>
                    </div>
                    <div class="mt-2 md:ml-28">
                        <input type="submit" value="Tambah"
                            class="bg-slate-300 p-1 border active:bg-slate-500 cursor-pointer rounded-md" />
                    </div>
                </form>
                <div class="md:ml-[700px] mb-1 mt-3 md:mt-0">
                    <label htmlFor="cari">
                        <h1 class="inline mr-2">Cari</h1>
                        <input type="text" class="focus:outline-none border-solid border-b-2 border-slate-400"
                            id="cari" />
                    </label>
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recipes as $recipe)
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
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div class="my-2 mx-auto">{{ $recipes->Links() }}</div>
            </div>
            <div class="mt-3 ml-28">
                <h1 id="bayar"></h1>
                <div class="mt-3 flex">
                    <input type="submit" value="bayar"
                        class="rounded-md active:border-slate-600 bg-slate-200 p-1 w-min cursor-pointer" />
                    <input type="text" class="ml-3 focus:outline-none border-solid border-b-2 border-slate-400 ">
                </div>
                <div class="mt-3 flex">
                    <p>Kembali</p>
                    <p class="ml-3" id="kembali"></p>
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
                });
        }
    </script>
</body>

</html>
