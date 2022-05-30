<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masjid;

class MasjidController extends Controller
{
 
    
    public function showRekap() {

        $masjidMasuk = Masjid::where('jenis', 'masuk')->sum('masuk');
        $masjidKeluar = Masjid::where('jenis', 'keluar')->sum('keluar');
        $saldoMasjid = $masjidMasuk - $masjidKeluar;

        $data = Masjid::orderBy('tgl_kas', 'asc')->get();

        return view('masjid.masjidrekap',[
            'data'=>$data,
            'saldoMasuk'=>$masjidMasuk,
            'saldoKeluar'=>$masjidKeluar,
            'saldoMasjid'=>$saldoMasjid
        ]);
    }

    public function showLaporan() {

        return view('masjid.laporan.laporan');

    }

    public function showLaporanFull() {

        $masjidMasuk = Masjid::where('jenis', 'masuk')->sum('masuk');
        $masjidKeluar = Masjid::where('jenis', 'keluar')->sum('keluar');
        $saldoMasjid = $masjidMasuk - $masjidKeluar;

        $data = Masjid::orderBy('tgl_kas', 'asc')->get();

        return view('masjid.laporan.laporanfull', [
            'data'=>$data,
            'saldoMasuk'=>$masjidMasuk,
            'saldoKeluar'=>$masjidKeluar,
            'saldoMasjid'=>$saldoMasjid
        ]);

    }

    public function showLaporanSebagian(Request $request) {

        $tgl1 = $request->tgl_1;
        $tgl2 = $request->tgl_2;

        $masjidMasuk = Masjid::where('jenis', 'masuk')->whereBetween('tgl_kas', [$tgl1, $tgl2])->sum('masuk');
        $masjidKeluar = Masjid::where('jenis', 'keluar')->whereBetween('tgl_kas', [$tgl1, $tgl2])->sum('keluar');
        $saldoMasjid = $masjidMasuk - $masjidKeluar;

        $data = Masjid::orderBy('tgl_kas', 'asc')->whereBetween('tgl_kas', [$tgl1, $tgl2])->get();

        return view('masjid.laporan.laporanseb', [
            'data'=>$data,
            'saldoMasuk'=>$masjidMasuk,
            'saldoKeluar'=>$masjidKeluar,
            'saldoMasjid'=>$saldoMasjid,
            'date1'=>$tgl1,
            'date2'=>$tgl2
        ]);

    }

    public function delete($id) {
        
        Masjid::where('masjid_id', $id)->delete();

        return back()->with('success', 'Data Berhasil dihapus');

    }

    

    

   

}
