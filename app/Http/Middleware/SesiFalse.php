<?php

namespace App\Http\Middleware;

use App\Models\ModelToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class SesiFalse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('data') && !empty(Session::get('data')->token)) {
            $sesitoken = Http::asForm()->post('https://initiatory-equation.000webhostapp.com/api/session.php', [
                'token' => Session::get('data')->token
            ]);

            if (json_decode($sesitoken->body())->status == 'success') {
                if (ModelToken::where('token', Session::get('data')->token)->exists()) {
                    Alert::error('Gagal', 'Anda tidak dapat mengakses halaman ini');
                    return redirect(route('dashboard'));
                }
            }
        }

        return $next($request);
    }

}