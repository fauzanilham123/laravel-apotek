<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="shortcut icon" href="storage/images/icon_admin.png" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    @vite('resources/css/app.css')

</head>

<body>
    <div class="container bg-white md:flex">
        <div>
            <div
                class="bg-black flex w-full h-10 text-white mx-auto justify-between items-center md:h-screen md:w-72 md:mx-0 md:block md:text-black">
                <div class="w-10 md:w-36 md:mx-auto pt-10">
                    <img src="storage/images/icon_admin.png" alt="" />
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
                <a href="/logout">
                    <div
                        class="hidden md:block bg-white h-10 w-[280px] mx-auto rounded-md text-center leading-[40px] cursor-pointer active:bg-slate-400 mt-5">
                        Logout
                    </div>
                </a>
            </div>
        </div>
        <div class="w-full">
            <div class="mt-2 mb-3">
                <h1 class="font-bold text-center">Laporan Penjualan</h1>
                <div class="flex justify-center">
                    <p class="mr-2">Dari Tgl</p>
                    <input type="date" class="mr-20 border border-solid border-black rounded-sm" />
                    <p class="ml-20">Sampai Tgl</p>
                    <input type="date" class="ml-2 border border-solid border-black rounded-sm" />
                </div>
            </div>
            <div
                class="relative flex flex-col md:max-w-screen md:max-h-screen h-72 overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border md:ml-5 md:mr-5 ">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    @sortablelink('no', 'No')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    @sortablelink('date', 'Tanggal Transaksi')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    @sortablelink('total_bayar', 'Total Bayar')
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                            <tr>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $transaction->no }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $transaction->date }}

                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $transaction->total_bayar }}

                                    </p>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
                <div class="my-2 mx-auto">{{ $transactions->Links() }}</div>

            </div>
        </div>
    </div>
</body>

</html>
