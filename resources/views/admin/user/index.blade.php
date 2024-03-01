@extends('layouts.app')

@section('content')
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
                                    <option value="">{{ old('role') ? '' : 'Pilih role' }}</option>

                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>

                                    <option value="apoteker" {{ old('role') == 'apoteker' ? 'selected' : '' }}>Apoteker
                                    </option>

                                    <option value="kasir" {{ old('role') == 'kasir' ? 'selected' : '' }}>Kasir</option>
                                </select>
                            </label>
                        </div>
                        <div class="mt-5 border-solid border-b-2 border-slate-400">
                            <label htmlFor="nama">
                                <h1 class="font-semibold">Nama</h1>
                                <input type="text" id="nama" class="w-72 focus:outline-none"
                                    placeholder="masukkan nama" name="name" value="{{ old('name') }}" required />
                            </label>
                        </div>
                        <div class="mt-5 border-solid border-b-2 border-slate-400">
                            <label htmlFor="telepon">
                                <h1 class="font-semibold">telepon</h1>
                                <input type="number" id="telepon" class="w-72 focus:outline-none"
                                    placeholder="masukkan telepon" name="telepon" required value="{{ old('telepon') }}" />
                            </label>
                        </div>
                    </div>
                    <div class="h-52 bg-green-500 w-2 hidden md:block"></div>
                    <div class="md:ml-24 mr-24 md:mr-0">
                        <div class="border-solid border-b-2 border-slate-400">
                            <label htmlFor="alamat">
                                <h1 class="font-semibold">Alamat</h1>
                                <input type="text" id="alamat" class="w-72 focus:outline-none"
                                    placeholder="masukkan alamat" name="alamat" value="{{ old('alamat') }}" required />
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
                                <input type="password" id="password" class="w-72 focus:outline-none"
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
                <form action="" method="get">
                    <label htmlFor="cari">
                        <h1 class="inline mr-2">Cari</h1>
                        <input type="search" class="focus:outline-none border-solid border-b-2 border-slate-400"
                            id="cari" name="cari" value="{{ request('cari') }}" />
                        <input type="button" value="">
                    </label>
                </form>
            </div>
        </div>
        <div
            class="relative flex flex-col md:max-w-screen md:max-h-screen h-72 overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border ">
            <table class="w-full text-left table-auto min-w-max" id="dataTable">
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
                    @foreach ($users as $user)
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
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="flex"
                                    onsubmit="return confirm('Apakah Anda Yakin ?');">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('user.edit', $user->id) }}">
                                        <svg class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                            <line x1="16" y1="5" x2="19" y2="8" />
                                        </svg>
                                    </a>
                                    <button type="submit">
                                        <svg class="h-5 w-5 text-red-500" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-2">{{ $users->appends(request()->except('page'))->Links('pagination::tailwind') }}</div>
        </div>
    </div>
    <script>
        function removeDefault() {
            var select = document.getElementById("role");
            select.options[0].style.display = "none";
        }
    </script>
@endsection
