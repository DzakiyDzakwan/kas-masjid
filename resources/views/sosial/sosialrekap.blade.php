@extends('layout.main')

@include('components.rupiah')

@section('content')

<div class="alert alert-info alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5>
  <i class="icon fas fa-info"></i> Saldo Kas Sosial</h5>
<h5>Pemasukan :
  
{{rupiah($saldoMasuk)}}

</h5>

<h5>Pengeluaran :
 
  {{rupiah($saldoKeluar)}};
  
</h5>
<hr>

<h3>Saldo Akhir :
  
  {{rupiah($saldoSosial)}}
  
</h3>
</div>

<div class="card card-primary">
<div class="card-header">
  <h3 class="card-title">
    <i class="fa fa-table"></i> Rekap Kas Sosial</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
  <div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Uraian</th>
          <th>Pemasukan</th>
          <th>Pengeluaran</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($data as $sosial)
        <tr>
          <td>
            {{$loop->iteration}}
          </td>
          <td>
            {{date("d/M/Y", strtotime($sosial['tgl_kas']))}}
          </td>
          <td>
            {{$sosial['uraian']}}
          </td>
          <td align="right">
            {{rupiah($sosial['masuk'])}}
          </td>
          <td align="right">
            {{rupiah($sosial['keluar'])}}
          </td>
        </tr>
        @endforeach

      </tbody>
      </tfoot>
    </table>
  </div>
</div>
<!-- /.card-body -->
@endsection