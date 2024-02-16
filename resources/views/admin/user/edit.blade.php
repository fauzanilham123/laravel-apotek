@extends('layouts.app')

@section('content')
    <div class="mx-auto">
        <div class="mt-2 mb-3">
            <h1 class="font-bold text-center">Edit User</h1>
        </div>
        <div class="ml-3">
            <form action="{{ route('user.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="justify-center items-start">
                    <div class="">
                        <div class="border-solid border-b-2 border-slate-400">
                            <label htmlFor="role">
                                <h1 class="font-semibold">Role</h1>
                                <select id="role" class="w-72 focus:outline-none" name="role" required>
                                    <option value="admin" {{ $users->role == 'admin' ? 'selected' : '' }}>Admin
                                    </option>

                                    <option value="apoteker" {{ $users->role == 'apoteker' ? 'selected' : '' }}>
                                        Apoteker</option>

                                    <option value="kasir" {{ $users->role == 'kasir' ? 'selected' : '' }}>Kasir
                                    </option>

                                </select>
                            </label>
                        </div>
                        <div class="mt-5 border-solid border-b-2 border-slate-400">
                            <label htmlFor="nama">
                                <h1 class="font-semibold">Nama</h1>
                                <input type="text" id="nama" class="w-72 focus:outline-none"
                                    value="{{ old('name', $users->name) }}" placeholder="masukkan nama" name="name"
                                    required />
                            </label>
                        </div>
                        <div class="mt-5 border-solid border-b-2 border-slate-400">
                            <label htmlFor="telepon">
                                <h1 class="font-semibold">Telepon</h1>
                                <input type="number" id="telepon" class="w-72 focus:outline-none"
                                    value="{{ old('telepon', $users->telepon) }}" placeholder="masukkan email"
                                    name="telepon" required pattern="\d*" />
                            </label>
                        </div>
                        <div class="mt-5 border-solid border-b-2 border-slate-400">
                            <label htmlFor="alamat">
                                <h1 class="font-semibold">Alamat</h1>
                                <input type="text" id="alamat" class="w-72 focus:outline-none"
                                    value="{{ old('alamat', $users->alamat) }}" placeholder="masukkan ujumlah"
                                    name="alamat" required />
                            </label>
                        </div>
                        <div class="mt-5 border-solid border-b-2 border-slate-400">
                            <label htmlFor="username">
                                <h1 class="font-semibold">Username</h1>
                                <input type="text" id="username" class="w-72 focus:outline-none"
                                    value="{{ old('username', $users->username) }}" placeholder="masukkan username"
                                    name="username" required />
                            </label>
                        </div>
                        @error('username')
                            <div class="text-red-500">username sudah digunakan </div>
                        @enderror
                        <div class="mt-5 border-solid border-b-2 border-slate-400">
                            <label htmlFor="password">
                                <h1 class="font-semibold">Password</h1>
                                <input type="text" id="password" class="w-72 focus:outline-none" value=""
                                    placeholder="masukkan password" name="password" />
                            </label>
                        </div>
                    </div>

                </div>
                <div class="mt-3">
                    <input type="submit" value="Simpan"
                        class="bg-slate-300 p-1 border active:bg-slate-500 cursor-pointer rounded-md" />
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
