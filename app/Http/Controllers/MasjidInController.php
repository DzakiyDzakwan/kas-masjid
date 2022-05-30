<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masjid;

class MasjidInController extends Controller
{
    public function showMasuk() {

        //Mesjid
        $saldoMasuk = Masjid::where('jenis', 'masuk')->sum('masuk');

        $data = Masjid::where('jenis', 'masuk')->get();

        return view('masjid.in.masjidmasuk', [
            'saldoMasuk'=>$saldoMasuk,
            'data'=>$data
        ]);
    }

    public function showAdd() {

        return view('masjid.in.masjidadd');
    }

    public function store(Request $request) {

        /* dd($request->all()); */

        Masjid::create([
            'uraian'=>$request->uraian_km,
            'masuk'=>preg_replace("/[^0-9]/", "", $request->masuk),
            'tgl_kas'=>$request->tgl_km,
            'jenis'=>'masuk'
        ]);

        return redirect('/masjid/masuk')->with('success', 'Data Berhasil ditambahkan');;
    }

    public function showEdit($id) {

        $masjid = Masjid::where('masjid_id', $id)->get()[0];

        return view('masjid.in.masjidedit', [
            'masjid'=>$masjid,
        ]);
    }

    public function edit(Request $request) {

        $id = $request->masjid_id;

        Masjid::where('masjid_id', $id)->update([
            'uraian'=>$request->uraian_km,
            'masuk'=>preg_replace("/[^0-9]/", "", $request->masuk),
            'tgl_kas'=>$request->tgl_km
        ]);


       return redirect('/masjid/masuk')->with('success', 'Data Berhasil diubah');
    }

    
}
