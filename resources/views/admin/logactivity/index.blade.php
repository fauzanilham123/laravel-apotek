@extends('layouts.app')

@section('content')
    <div class="mx-auto">
        <div class="mt-2 mb-3">
            <h1 class="font-bold text-center">Log Activity</h1>
        </div>
        <div
            class="relative flex flex-col md:w-[930px] md:min-h-screen overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-200">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                id
                            </p>
                        </th>
                        <th class="p-4 border-b border-gray-300 bg-gray-200">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                username
                            </p>
                        </th>
                        <th class="p-4 border-b border-gray-300 bg-gray-200">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                waktu
                            </p>
                        </th>
                        <th class="p-4 border-b border-gray-300 bg-gray-200">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                aktifitas
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
                                    {{ $logactivity->id_user }}
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
                                    {{ $logactivity->activity }}
                                </p>
                            </td>
                    @endforeach
                </tbody>
            </table>
            {{ $logactivities->Links() }}
        </div>
    </div>
@endsection
