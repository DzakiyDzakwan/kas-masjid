<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sosial;

class SosialOutController extends Controller
{
    public function showKeluar() {

        //Mesjid
        $saldoKeluar = Sosial::where('jenis', 'keluar')->sum('keluar');

        $data = Sosial::where('jenis', 'keluar')->get();

        return view('sosial.out.sosialkeluar', [
            'saldoKeluar'=>$saldoKeluar,
            'data'=>$data
        ]);
    }

    public function showAdd() {

        return view('sosial.out.sosialadd');
    }

    public function store(Request $request) {

        /* dd($request->all()); */

        Sosial::create([
            'uraian'=>$request->uraian_km,
            'keluar'=>preg_replace("/[^0-9]/", "", $request->keluar),
            'tgl_kas'=>$request->tgl_km,
            'jenis'=>'keluar'
        ]);

        return redirect('/sosial/keluar')->with('success', 'Data Berhasil ditambah');

        
    }

    public function showEdit($id) {

        $sosial = Sosial::where('sosial_id', $id)->get()[0];

        return view('sosial.out.sosialedit',[
            'sosial'=>$sosial
        ]);
    }

    public function edit(Request $request) {
        /* dd($request->all()); */

        $id = $request->sosial_id;

        Sosial::where('sosial_id', $id)->update([
            'uraian'=>$request->uraian_km,
            'keluar'=>preg_replace("/[^0-9]/", "", $request->keluar),
            'tgl_kas'=>$request->tgl_km
        ]);

        return redirect('/sosial/keluar')->with('success', 'Data Berhasil diubah');
    }
}
