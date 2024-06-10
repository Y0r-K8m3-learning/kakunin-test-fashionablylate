<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckLoginStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if (Auth::check()) {
            // ログインしている場合の処理
            if ($request->is('/')) {
                return redirect('/contact');
            } elseif ($request->is('login')) {

                return redirect('/admin');
            }
        } else {
            if ($request->is('/')) {

                return redirect('/login');
            }
        }
          
        return $next($request);

    }
}
