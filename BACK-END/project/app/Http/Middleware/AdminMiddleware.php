<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Проверяем, является ли текущий пользователь администратором (role_id = 1)
        if (auth()->check() && auth()->user()->role_id == 1) {
            return $next($request);
        }

        // Если не является администратором, перенаправляем на страницу входа
        return redirect()->route('home');
    }
}
