<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="shortcut icon" href="{{ asset('storage/images/icon_admin.png') }}" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    @vite('resources/css/app.css')
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
        </div>
        <div class="mx-auto">
            <div class="mt-2 mb-3">
                <h1 class="font-bold text-center">Kelola User</h1>
            </div>
            <div class="ml-3">
                <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="md:flex justify-center items-start">
                        <div class="md:mr-24 mr-24">
                            <div class="border-solid border-b-2 border-slate-400">
                                <label htmlFor="role">
                                    <h1 class="font-semibold">Role</h1>
                                    <select id="role" class="w-72 focus:outline-none" name="role"
                                        onchange="removeDefault()" required>
                                        <option value="">Pilih role</option>
                                        <option value="admin">Admin</option>
                                        <option value="apoteker">Apoteker</option>
                                        <option value="kasir">Kasir</option>
                                    </select>
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="nama">
                                    <h1 class="font-semibold">Nama</h1>
                                    <input type="text" id="nama" class="w-72 focus:outline-none"
                                        placeholder="masukkan nama" name="name" value="{{ old('name') }}"
                                        required />
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="telepon">
                                    <h1 class="font-semibold">telepon</h1>
                                    <input type="number" id="telepon" class="w-72 focus:outline-none"
                                        placeholder="masukkan telepon" name="telepon" required
                                        value="{{ old('telepon') }}" />
                                </label>
                            </div>
                        </div>
                        <div class="h-52 bg-green-500 w-2 hidden md:block"></div>
                        <div class="md:ml-24 mr-24 md:mr-0">
                            <div class="border-solid border-b-2 border-slate-400">
                                <label htmlFor="alamat">
                                    <h1 class="font-semibold">Alamat</h1>
                                    <input type="text" id="alamat" class="w-72 focus:outline-none"
                                        placeholder="masukkan alamat" name="alamat" value="{{ old('alamat') }}"
                                        required />
                                </label>
                            </div>
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="username">
                                    <h1 class="font-semibold">Username</h1>
                                    <input type="text" id="username" class="w-72 focus:outline-none"
                                        placeholder="masukkan username" name="username" value="{{ old('username') }}"
                                        required />
                                </label>
                            </div>
                            @error('username')
                                <div class="text-red-500">username sudah digunakan </div>
                            @enderror
                            <div class="mt-5 border-solid border-b-2 border-slate-400">
                                <label htmlFor="password">
                                    <h1 class="font-semibold">Password</h1>
                                    <input type="text" id="password" class="w-72 focus:outline-none"
                                        placeholder="masukkan password" name="password" value="{{ old('password') }}"
                                        required />
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 md:ml-[70px]">
                        <input type="submit" value="Tambah"
                            class="bg-slate-300 p-1 border active:bg-slate-500 cursor-pointer rounded-md" />
                    </div>
                </form>
                <div class="md:ml-[700px] mb-1 mt-3 md:mt-0">
                    <label htmlFor="cari">
                        <h1 class="inline mr-2">Cari</h1>
                        <input type="text" class="focus:outline-none border-solid border-b-2 border-slate-400"
                            id="cari" name="cari" />
                    </label>
                </div>
            </div>
            <div
                class="relative flex flex-col md:max-w-screen md:max-h-screen h-72 overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border ">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    @sortablelink('id')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    @sortablelink('role', 'Role')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    @sortablelink('name', 'Nama')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    @sortablelink('telepon', 'Telepon')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    @sortablelink('alamat', 'Alamat')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    @sortablelink('username', 'Username')
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-300 bg-gray-200">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                    Aksi
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $user->id }}

                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $user->role }}

                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $user->name }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <a href="#">
                                        <p
                                            class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                            +62{{ $user->telepon }}
                                        </p>
                                    </a>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $user->alamat }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $user->username }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda Yakin ?');">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('user.edit', $user->id) }}">
                                            <p
                                                class="inline font-sans text-sm antialiased font-normal leading-normal text-blue-700">
                                                Edit
                                            </p>
                                        </a>
                                        <button type="submit">
                                            <p
                                                class="inline font-sans text-sm antialiased font-normal leading-normal text-red-700">
                                                Hapus
                                            </p>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
                <div class="my-2 mx-auto">{{ $users->Links() }}</div>
            </div>
        </div>
    </div>
    <script>
        function removeDefault() {
            var select = document.getElementById("role");
            select.options[0].style.display = "none";
        }
    </script>
</body>

</html>
