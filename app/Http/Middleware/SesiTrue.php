<?php

namespace App\Http\Middleware;

use App\Models\ModelToken;
use Closure;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class SesiTrue
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (!Session::has('data') || empty(Session::get('data')->token)) {
            Alert::error('Gagal', 'Anda tidak dapat mengakses halaman ini');
            return redirect(route('login'));
        } else {
            $token = Session::get('data')->token;
            $sesitoken = Http::asForm()->post('https://initiatory-equation.000webhostapp.com/api/session.php', ['token' => $token]);
            if (json_decode($sesitoken->body())->status != 'success') {
                ModelToken::where('token', '=', Session::get('data')->token)->delete();
                Session::forget('data');
                Alert::error('Gagal', 'Token has been expired!');
                return redirect(route('login'));
            }
        }
        return $next($request);
    }
}
