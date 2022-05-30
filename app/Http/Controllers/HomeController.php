<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masjid;
use App\Models\User;
use App\Models\Sosial;

class HomeController extends Controller
{
    
    public function index() {

        //Mesjid
        $masjidMasuk = Masjid::where('jenis', 'masuk')->sum('masuk');
        $masjidKeluar = Masjid::where('jenis', 'keluar')->sum('keluar');
        $saldoMasjid = $masjidMasuk - $masjidKeluar;

        //Sosial
        $sosialMasuk = Sosial::where('jenis', 'masuk')->sum('masuk');
        $sosialKeluar = Sosial::where('jenis', 'keluar')->sum('keluar');
        $saldoSosial = $sosialMasuk - $sosialKeluar;

        //User
        $user = User::count();

        return view('dashboard', [
            'saldoMasjid' => $saldoMasjid,
            'saldoSosial' => $saldoSosial,
            'totalUser' => $user, 
        ]);

    }

}
