<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sosial;


class SosialController extends Controller
{
    public function showRekap() {

        $sosialMasuk = Sosial::where('jenis', 'masuk')->sum('masuk');
        $sosialKeluar = Sosial::where('jenis', 'keluar')->sum('keluar');
        $saldoSosial = $sosialMasuk - $sosialKeluar;

        $data = Sosial::orderBy('tgl_kas', 'asc')->get();

        return view('Sosial.sosialrekap',[
            'data'=>$data,
            'saldoMasuk'=>$sosialMasuk,
            'saldoKeluar'=>$sosialKeluar,
            'saldoSosial'=>$saldoSosial
        ]);
    }

    public function showLaporan() {

        return view('sosial.laporan.laporan');

    }

    public function showLaporanFull() { 

        $sosialMasuk = Sosial::where('jenis', 'masuk')->sum('masuk');
        $sosialKeluar = Sosial::where('jenis', 'keluar')->sum('keluar');
        $saldoSosial = $sosialMasuk - $sosialKeluar;

        $data = Sosial::orderBy('tgl_kas', 'asc')->get();

        return view('sosial.laporan.laporanfull', [
            'data'=>$data,
            'saldoMasuk'=>$sosialMasuk,
            'saldoKeluar'=>$sosialKeluar,
            'saldoSosial'=>$saldoSosial
        ]);

    }

    public function showLaporanSebagian(Request $request) {

        /* dd($request->all()); */

        $tgl1 = $request->tgl_1;
        $tgl2 = $request->tgl_2;

        $sosialMasuk = Sosial::where('jenis', 'masuk')->whereBetween('tgl_kas', [$tgl1, $tgl2])->sum('masuk');
        $sosialKeluar = Sosial::where('jenis', 'keluar')->whereBetween('tgl_kas', [$tgl1, $tgl2])->sum('keluar');
        $saldoSosial = $sosialMasuk - $sosialKeluar;

        $data = Sosial::orderBy('tgl_kas', 'asc')->whereBetween('tgl_kas', [$tgl1, $tgl2])->get();

        return view('sosial.laporan.laporanseb', [
            'data'=>$data,
            'saldoMasuk'=>$sosialMasuk,
            'saldoKeluar'=>$sosialKeluar,
            'saldoSosial'=>$saldoSosial,
            'date1'=>$tgl1,
            'date2'=>$tgl2
        ]);

    }

    public function delete($id) {
        
        Sosial::where('sosial_id', $id)->delete();

        return back()->with('success', 'Data Berhasil dihapus');

    }
}
