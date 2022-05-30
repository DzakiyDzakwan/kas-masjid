<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masjid;

class MasjidOutController extends Controller
{
    public function showKeluar() {

        //Mesjid
        $saldoKeluar = Masjid::where('jenis', 'keluar')->sum('keluar');

        $data = Masjid::where('jenis', 'keluar')->get();

        return view('masjid.out.masjidkeluar', [
            'saldoKeluar'=>$saldoKeluar,
            'data'=>$data
        ]);
    }

    public function showAdd() {

        return view('masjid.out.masjidadd');
    }

    public function store(Request $request) {

        /* dd($request->all()); */

        Masjid::create([
            'uraian'=>$request->uraian_km,
            'keluar'=>preg_replace("/[^0-9]/", "", $request->keluar),
            'tgl_kas'=>$request->tgl_km,
            'jenis'=>'keluar'
        ]);

        return redirect('/masjid/keluar')->with('success', 'Data Berhasil ditambah');

        
    }

    public function showEdit($id) {

        $masjid = Masjid::where('masjid_id', $id)->get()[0];

        return view('masjid.out.masjidedit',[
            'masjid'=>$masjid
        ]);
    }

    public function edit(Request $request) {
        /* dd($request->all()); */

        $id = $request->masjid_id;

        Masjid::where('masjid_id', $id)->update([
            'uraian'=>$request->uraian_km,
            'keluar'=>preg_replace("/[^0-9]/", "", $request->keluar),
            'tgl_kas'=>$request->tgl_km
        ]);

        return redirect('/masjid/keluar')->with('success', 'Data Berhasil diubah');
    }
}
