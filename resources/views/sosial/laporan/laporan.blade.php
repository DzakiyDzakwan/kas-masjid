@extends('layout.main')

@section('content')
<div class="card card-secondary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-file"></i> Laporan Kas Sosial</h3>
  </div>
  <form action="/sosial/laporansebagian" method="post" enctype="multipart/form-data" target="_blank">
    @csrf
    <div class="card-body">

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Awal</label>
        <div class="col-sm-4">
          <input type="date" class="form-control" id="tgl_1" name="tgl_1">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Akhir</label>
        <div class="col-sm-4">
          <input type="date" class="form-control" id="tgl_2" name="tgl_2">
        </div>
      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-info" name="btnCetak" target="_blank">Cetak Periode</button>
      <a href="/sosial/laporanfull" class="btn btn-primary" target="_blank">Cetak Semua</a>
    </div>
  </form>
</div>


@endsection