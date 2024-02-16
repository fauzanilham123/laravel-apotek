<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


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
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if($user->role === 'admin') {
                return redirect()->intended('/');

            } else if($user->role === 'apoteker') {  
                return redirect()->intended('/resep');
    
            } else if($user->role === 'kasir') {
                return redirect()->intended('/kasir');
                }
            }
        return back()->with("loginError", 'Login gagal! username atau password salah');
    }

            public function logout(Request $request): RedirectResponse
        {
            Auth::logout();
        
            $request->session()->invalidate();
        
            $request->session()->regenerateToken();
        
            return redirect('/login');
        }
}