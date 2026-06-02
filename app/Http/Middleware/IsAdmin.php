<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Kullanıcı giriş yapmış mı ve is_admin değeri 1 (Evet) mi?
        if (Auth::check() && Auth::user()->is_admin == 1) {
            return $next($request); // İzin ver, sayfayı aç
        }

        // Değilse, yetkisiz erişim hatası ver (veya anasayfaya yönlendir)
        abort(403, 'Bu sayfaya erişim yetkiniz bulunmamaktadır.');
        // Alternatif olarak: return redirect('/dashboard')->with('error', 'Yetkiniz yok.');
    }
}
