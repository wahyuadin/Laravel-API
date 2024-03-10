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
        return $this->redirectToLogin('Anda tidak dapat mengakses halaman ini');
    }

    $token = Session::get('data')->token;
    $sesitoken = Http::asForm()->post('https://initiatory-equation.000webhostapp.com/api/session.php', ['token' => $token]);

    if ($sesitoken->failed() || json_decode($sesitoken->body())->status != 'success') {
        $this->clearSessionAndToken();
        return $this->redirectToLogin($sesitoken->failed() ? 'Gagal menghubungkan ke API!' : 'Token has been expired!');
    }

    return $next($request);
}

    private function redirectToLogin($message)
    {
        Alert::error('Gagal', $message);
        return redirect(route('login'));
    }

    private function clearSessionAndToken()
    {
        ModelToken::where('token', '=', Session::get('data')->token)->delete();
        Session::forget('data');
    }
}

