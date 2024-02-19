@extends('layouts.app')

@section('content')
    <div class="mx-auto">
        <div class="mt-2">
            <h1 class="font-bold text-center">Log Activity</h1>
        </div>
        <div class="flex justify-center mb-2">
            <form action="" method="get">
                <label for="dari_tanggal">
                    <p class="mr-2 inline">Dari Tgl</p>
                    <input type="datetime-local" class="mr-20 border border-solid border-black rounded-sm inline"
                        name="dari_tanggal" id="dari_tanggal" value="{{ request('dari_tanggal') }}" />
                </label>
                <label for="sampai_tanggal">
                    <p class="ml-20 inline">Sampai Tgl</p>
                    <input type="datetime-local" class="ml-2 border border-solid border-black rounded-sm"
                        name="sampai_tanggal" id="sampai_tanggal" value="{{ request('sampai_tanggal') }}" />
                </label>
                <input type="submit" value="Load"
                    class="relative left-10 bg-slate-300 px-1 border active:bg-slate-500 cursor-pointer rounded-md">
            </form>
        </div>
        <div
            class="relative flex flex-col md:w-[930px] md:min-h-screen overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
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
                                @sortablelink('causer_id', 'username')
                            </p>
                        </th>
                        <th class="p-4 border-b border-gray-300 bg-gray-200">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                @sortablelink('time', 'waktu')
                            </p>
                        </th>
                        <th class="p-4 border-b border-gray-300 bg-gray-200">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                @sortablelink('description', 'Aktivitas')
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logactivities as $logactivity)
                        <tr>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    {{ $logactivity->id }}
                                </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    {{ $logactivity->causer->username }}
                                </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    {{ $logactivity->time }}

                                </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    {{ $logactivity->description }}
                                </p>
                            </td>
                    @endforeach
                </tbody>
            </table>
            <div class="my-2">
                {{ $logactivities->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
@endsection
