<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public $sampul;
    public $pp;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->sampul = Http::get('https://initiatory-equation.000webhostapp.com/api/sampul.php', [
                'id'    => Session::get('data')->data->id,
                'token' => Session::get('data')->token,
            ]);

            $this->pp = Http::get('https://initiatory-equation.000webhostapp.com/api/gambar.php', [
                'id'    => Session::get('data')->data->id,
                'token' => Session::get('data')->token,
            ]);

            return $next($request);
        });
    }

    public function index() {
        return view('dashboard', [
            'auth'      => Session::get('data')->data,
            'sampul'    => json_decode($this->sampul->body())->data,
            'profile'   => json_decode($this->pp->body())->data,
        ]);
    }

    public function profile(Request $request) {
        if ($request->has('submitProfile')) {
            $this->validate($request, ['foto' => 'image|required|mimes:jpeg,png,jpg|max:2048'], [
                'foto.required'   => 'File gambar harus diunggah.',
                'foto.mimes'      => 'File yang diunggah harus dalam format JPEG, PNG, atau JPG.',
                'foto.max'        => 'Ukuran file gambar tidak boleh melebihi 2MB.',

            ]);
            $response = Http::attach('profile',file_get_contents($request->file('foto')->getRealPath()),
            $request->file('foto')->getClientOriginalName())->post('https://initiatory-equation.000webhostapp.com/api/gambar.php',
                ['token'   => Session::get('data')->token,
                    'id'   => Session::get('data')->data->id]);
            if ($response->successful()) {
                $respon = json_decode($response->body());
                Alert::success($respon->status,"Gambar Berhasil Diunggah!");
            }
            return redirect(route('profile'));
        }

        if ($request->has('submitSampul')) {
            $this->validate($request, ['sampul' => 'image|required|mimes:jpeg,png,jpg|max:2048'], [
                'sampul.required'   => 'File gambar harus diunggah.',
                'sampul.mimes'      => 'File yang diunggah harus dalam format JPEG, PNG, atau JPG.',
                'sampul.max'        => 'Ukuran file gambar tidak boleh melebihi 2MB.',
            ]);
            $response = Http::attach('sampul',file_get_contents($request->file('sampul')->getRealPath()),
            $request->file('sampul')->getClientOriginalName())->post('https://initiatory-equation.000webhostapp.com/api/sampul.php',
                ['token'   => Session::get('data')->token,
                    'id'   => Session::get('data')->data->id]);
            if ($response->successful()) {
                $respon = json_decode($response->body());
                Alert::success($respon->status,"Gambar Berhasil Diunggah!");
            }
            return redirect(route('profile'));
        }
        return view('profile', ['auth'=> Session::get('data')->data,'sampul'=>json_decode($this->sampul->body())->data,'profile'=> json_decode($this->pp->body())->data,]);
    }

    public function get() {
        $response = Http::asForm()->post('https://initiatory-equation.000webhostapp.com/api/data.php', [
            'token' => Session::get('data')->token
        ]);

        dd(Session::get('data'));
    }
}
