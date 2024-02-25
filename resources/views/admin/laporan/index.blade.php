@extends('layouts.app')

@section('content')
    <div class="w-full">
        <div class="mt-2 mb-3">
            <h1 class="font-bold text-center">Laporan Penjualan</h1>
            <div class="flex justify-center">
                <form action="" method="get">
                    <label for="dari_tanggal">
                        <p class="mr-2 inline">Dari Tgl</p>
                        <input type="date" class="mr-20 border border-solid border-black rounded-sm inline"
                            name="dari_tanggal" id="dari_tanggal" value="{{ request('dari_tanggal') }}" />
                    </label>
                    <label for="sampai_tanggal">
                        <p class="ml-20 inline">Sampai Tgl</p>
                        <input type="date" class="ml-2 border border-solid border-black rounded-sm" name="sampai_tanggal"
                            id="sampai_tanggal" value="{{ request('sampai_tanggal') }}" />
                    </label>
                    <input type="submit" value="Load"
                        class="relative left-10 bg-slate-300 px-1 border active:bg-slate-500 cursor-pointer rounded-md font-semibold">
                </form>
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
                                @sortablelink('no', 'No Transaksi')
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
                    @foreach ($transactions as $transaction)
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
                                    Rp{{ number_format($transaction->total_bayar, 0, ',', '.') }}
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-2">{{ $transactions->appends(request()->except('page'))->Links('pagination::tailwind') }}</div>
        </div>
        <div class="flex">
            <a href="laporan/download-pdf">
                <div
                    class="ml-5 mt-5 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded cursor-pointer w-max">
                    Download
                    pdf
                </div>
            </a>
            <a href="laporan/pdf" target="_blank">
                <div
                    class="ml-5 mt-5 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded cursor-pointer w-max flex">
                    Cetak data <svg class="h-5 w-5 text-white ml-2" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                        <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                        <rect x="7" y="13" width="10" height="8" rx="2" />
                    </svg>
                </div>
            </a>
        </div>
    </div>
@endsection
