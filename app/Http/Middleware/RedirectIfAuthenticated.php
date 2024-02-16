<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

         foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

                 // Periksa nilai kolom 'role' langsung
                switch ($user->role) {
                    case 'admin':
                        return redirect('/');
                    case 'apoteker':
                        return redirect('/resep');
                    case 'kasir':
                        return redirect('/kasir');
                    // Tambahkan case lain jika diperlukan

                    default:
                        // Default redirect jika tidak ada peran yang sesuai
                        return redirect(RouteServiceProvider::HOME);
                        
                }
            }
        }

        return $next($request);
    }
}