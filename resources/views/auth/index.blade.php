<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="shortcut icon" href="{{ asset('storage/images/apotek.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')

</head>

<body class="font-inter font-medium	">
    <div class="container bg-white md:flex md:mb-auto">
        <div class="h-full w-full bg-black md:w-72 md:h-screen">
            <h1 class="text-white text-center p-2 md:p-10 md:mt-12">
                APOTEK <br /> MEKAR ASIH
                <div class="hidden md:w-32 md:flex md:mx-auto mt-5">
                    <Img src="storage/images/apotek.png" alt="apotek" />
                </div>
            </h1>
        </div>
        <div class="flex justify-center mb-10 w-auto mx-auto md:h-screen md:mt-12">
            <div>
                <div class="h-80 bg-green-500 w-2 mt-14 mr-5 md:mr-28"></div>
            </div>
            <div class="md:w-[500px]">
                <div class="mx-auto w-32 md:w-40">
                    <img src=storage/images/icon.png alt="icon" />
                </div>
                <div class="text-center mt-2 md:w-full font-semibold">
                    <p>Silahkan Login Dahulu !</p>
                </div>

                @if (session()->has('error'))
                    <div class="text-red-700 text-center">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="w-72 mx-auto mt-5 md:w-full">
                        <label htmlFor="nama">
                            <p class="font-semibold mb-2">Username</p>
                            <div class="border-solid border-b-2 border-slate-400 w-full">
                                <input type="text" placeholder="masukkan username" class="focus:outline-none w-full"
                                    id="nama" name="username" value="{{ old('username') }}" required />
                            </div>
                        </label>
                    </div>
                    <div class="w-72 mx-auto mt-5 md:w-full md:mt-10">
                        <label htmlFor="nama">
                            <p class="font-semibold mb-2">Password</p>
                            <div class="border-solid border-b-2 border-slate-400 flex ">
                                <input type="password" placeholder="masukkan password" class="focus:outline-none w-full"
                                    id="password" name="password" value="{{ old('password') }}" required />

                                <button type="button" id="showPasswordBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 eye-closed hidden text-slate-400 ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <svg class="h-6 w-6 eye-open text-slate-400 " viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24" />
                                        <line x1="1" y1="1" x2="23" y2="23" />
                                    </svg>
                                </button>
                            </div>
                        </label>
                    </div>
                    <div class="mt-6 font-bold">
                        <input type="submit" value="Login"
                            class="bg-slate-300 p-1 border active:bg-slate-500 rounded-md" />
                    </div>
                </form>
            </div>
            <div>
                <div class="h-80 bg-green-500 w-2 mt-14 ml-5 md:ml-28"></div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordBtn = document.getElementById('showPasswordBtn');

        showPasswordBtn.addEventListener('click', function() {

            // Toggle icon
            this.querySelector('.eye-open').classList.toggle('hidden');
            this.querySelector('.eye-closed').classList.toggle('hidden');

            // Toggle password visibility
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;

        });
    </script>
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

</html>
