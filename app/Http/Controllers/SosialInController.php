<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sosial;

class SosialInController extends Controller
{
    public function showMasuk() {

        //Mesjid
        $saldoMasuk = Sosial::where('jenis', 'masuk')->sum('masuk');

        $data = Sosial::where('jenis', 'masuk')->get();

        return view('sosial.in.sosialmasuk', [
            'saldoMasuk'=>$saldoMasuk,
            'data'=>$data
        ]);
    }

    public function showAdd() {

        return view('sosial.in.sosialadd');
    }

    public function store(Request $request) {

        /* dd($request->all()); */

        Sosial::create([
            'uraian'=>$request->uraian_km,
            'masuk'=>preg_replace("/[^0-9]/", "", $request->masuk),
            'tgl_kas'=>$request->tgl_km,
            'jenis'=>'masuk'
        ]);

        return redirect('/sosial/masuk')->with('success', 'Data Berhasil ditambah');
    }

    public function showEdit($id) {

        $sosial = Sosial::where('sosial_id', $id)->get()[0];

        return view('sosial.in.sosialedit', [
            'sosial'=>$sosial,
        ]);
    }

    public function edit(Request $request) {

        $id = $request->sosial_id;

        Sosial::where('sosial_id', $id)->update([
            'uraian'=>$request->uraian_km,
            'masuk'=>preg_replace("/[^0-9]/", "", $request->masuk),
            'tgl_kas'=>$request->tgl_km
        ]);


       return redirect('/sosial/masuk')->with('success', 'Data Berhasil diubah');
    }
}
