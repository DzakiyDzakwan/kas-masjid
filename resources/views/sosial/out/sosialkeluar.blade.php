@extends('layout.main')

@include('components.rupiah')

@section('content')
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h5>
		<i class="icon fas fa-info"></i> Total Pengeluaran Sosial</h5>
	<h2>
		{{rupiah($saldoKeluar)}}
	</h2>

</div>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Kas Sosial Keluar</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="/sosial/keluar/add" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Uraian</th>
						<th>Jumlah</th>
						<th>Aksi</th>
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
						<td >
							{{rupiah($sosial['keluar'])}}
						</td>
						<td>
							<a href="/sosial/keluar/edit/{{$sosial['sosial_id']}}" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<form action="/sosial/keluar/delete/{{$sosial['sosial_id']}}" method="POST" class="d-inline">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
							</form>
						</td>
					</tr>
					@endforeach
					
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
	@include('sweetalert::alert')
@endsection