<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class ProfileFilled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->profile_complete === false) {
            $data = [
                    'enabled' => true,
                    'title' => 'Perhatian!',
                    'text' => 'Mohon Lengkapi Data Diri Anda Terlebih Dahulu',
                    'icon' => 'info',
            ];
            Session::flash('swal', $data);
            return redirect()->route('data-diri');
        }

        return $next($request);
    }
}
