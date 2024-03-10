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
            $this->sampul = $this->getDataFromAPI('sampul');
            $this->pp = $this->getDataFromAPI('gambar');
            return $next($request);
        });
    }

    public function index() {
        return view('dashboard', [
            'auth'          => Session::get('data')->data,
            'sampul'        => $this->sampul,
            'profile'       => $this->pp
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
                $request->file('foto')->getClientOriginalName())->post(config('app.data').'/api/gambar.php',
                    ['token'   => Session::get('data')->token,
                        'id'   => Session::get('data')->data->id]);
                if ($response->successful()) {
                    $respon = json_decode($response->body());
                    Alert::success($respon->status,"Gambar Berhasil Diunggah!");
                }
                return redirect(route('profile'));
            } else if ($request->has('submitSampul')) {
                $this->validate($request, ['sampul' => 'image|required|mimes:jpeg,png,jpg|max:2048'], [
                    'sampul.required'   => 'File gambar harus diunggah.',
                    'sampul.mimes'      => 'File yang diunggah harus dalam format JPEG, PNG, atau JPG.',
                    'sampul.max'        => 'Ukuran file gambar tidak boleh melebihi 2MB.',
                ]);
                $response = Http::attach('sampul',file_get_contents($request->file('sampul')->getRealPath()),
                $request->file('sampul')->getClientOriginalName())->post(config('app.data').'/api/sampul.php',
                    ['token'   => Session::get('data')->token,
                        'id'   => Session::get('data')->data->id]);
                if ($response->successful()) {
                    $respon = json_decode($response->body());
                    Alert::success($respon->status,"Gambar Berhasil Diunggah!");
                }
                return redirect(route('profile'));
            }

        return view('profile', [
            'auth' => Session::get('data')->data,
            'sampul' => $this->sampul,
            'profile' => $this->pp,
        ]);
    }

    public function get() {
        $response = Http::asForm()->post(config('app.data')."/api/data.php", [
            'token' => Session::get('data')->token,
        ]);
        $data_api = json_decode($response->body())->data;

        $data = [];
        for ($i = max(0, count($data_api) - 10); $i < count($data_api); $i++) {
            $data[] = [
                'timestamp'     => $data_api[$i]->waktu,
                'temperature'   => str_replace('°C', '', $data_api[$i]->temperatur),
                'humidity'      => str_replace('%', '', $data_api[$i]->humadity),
                'pressure'      => str_replace('%', '', $data_api[$i]->kelembapan),
                'status'        => $data_api[$i]->status,
                'value'         => $data_api[$i]->value
            ];
        }
        return response()->json($data)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    public function tes() {
        return view('tes');
    }

    private function getDataFromAPI($endpoint) {
        if (Session::has('data')) {
            return Http::get(config('app.data')."/api/$endpoint.php", [
                'id' => Session::get('data')->data->id,
                'token' => Session::get('data')->token,
            ]);
        } else {
            return redirect(route('login'));
        }
    }
}
