@extends('layouts.app')

@section('content')
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
@endsection
