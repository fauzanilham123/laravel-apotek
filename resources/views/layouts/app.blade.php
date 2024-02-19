<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>
    <link rel="shortcut icon" href="{{ asset('storage/images/icon_admin.png') }}" />
    @vite('resources/css/app.css')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="md:flex">
        <div>
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
                            class="hidden md:block bg-white h-10 w-[280px] mx-auto rounded-md text-center leading-[40px] cursor-pointer active:bg-slate-400 mt-10 {{ Request::is('user') ? 'bg-slate-400 ' : '' }}">
                            Kelola User
                        </div>
                    </a>
                    <a href="/obat">
                        <div
                            class="hidden md:block bg-white h-10 w-[280px] mx-auto rounded-md text-center leading-[40px] cursor-pointer active:bg-slate-400 mt-5 {{ Request::is('obat') ? 'bg-slate-400 ' : '' }}">
                            Kelola Obat
                        </div>
                    </a>
                    <a href="/laporan">
                        <div
                            class="hidden md:block bg-white h-10 w-[280px] mx-auto rounded-md text-center leading-[40px] cursor-pointer active:bg-slate-400 mt-5 {{ Request::is('laporan') ? 'bg-slate-400 ' : '' }}">
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
        </div>
        @yield('content')
    </div>
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
