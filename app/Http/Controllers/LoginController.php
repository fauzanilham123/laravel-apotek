<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.index');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        $user = user::where('username', $credentials['username'])->first();

        if ($user && $user->flag == 0) {
            return back()->with("error", 'Akun Anda sudah tidak aktif.');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if($user->role === 'admin') {
                activity()->causedBy($user)->log('Login');
                return redirect()->intended('/')->with("success", 'Login sebagai admin berhasil!');;

            } else if($user->role === 'apoteker') { 
                activity()->causedBy($user)->log('Login');
                return redirect()->intended('/resep')->with("success", 'Login sebagai apoteker berhasil!');
    
            } else if($user->role === 'kasir') {
                activity()->causedBy($user)->log('Login');
                return redirect()->intended('/kasir')->with("success", 'Login sebagai kasir berhasil!');
                }
            }
        return back()->with("error", 'Login gagal! username atau password salah');
    }

            public function logout(Request $request): RedirectResponse
        {
            Auth::logout();
        
            $request->session()->invalidate();
        
            $request->session()->regenerateToken();
        
            return redirect('/login')->with("success", 'Logout berhasil');
        }
}