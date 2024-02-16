<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="shortcut icon" href="{{ asset('storage/images/icon_admin.png') }}" />

    @vite('resources/css/app.css')
</head>

<body>
    <div class="md:flex">
        <div>
            <div
                class="bg-black flex w-full h-10 text-white mx-auto justify-between items-center md:h-screen md:w-72 md:mx-0 md:block md:text-black">
                <div class="w-10 md:w-36 md:mx-auto pt-10">
                    <img src="{{ asset('storage/images/icon_admin.png') }}" alt="" />
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
                <a href="{{ route('logout') }}">
                    <div
                        class="hidden md:block bg-white h-10 w-[280px] mx-auto rounded-md text-center leading-[40px] cursor-pointer active:bg-slate-400 mt-5">
                        Logout
                    </div>
                </a>
            </div>
        </div>
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
                        @forelse ($logactivities as $logactivity)
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

                            @empty
                                <div class="alert alert-danger">
                                    Data belum ada.
                                </div>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $logactivities->Links() }}
            </div>
        </div>
    </div>
</body>

</html>
