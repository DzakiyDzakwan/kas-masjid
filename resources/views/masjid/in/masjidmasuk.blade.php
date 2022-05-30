@extends('layout.main')

@include('components.rupiah')

@section('content')



<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h5>
		<i class="icon fas fa-info"></i> Total Pemasukan Masjid</h5>
	<h2>
		{{rupiah($saldoMasuk)}}
	</h2>

</div>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Kas Masjid Masuk</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="/masjid/masuk/add" class="btn btn-primary">
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

					@foreach ($data as $masjid)
					<tr>
						<td>
							{{$loop->iteration}}
						</td>
						<td>
							{{date("d/M/Y", strtotime($masjid['tgl_kas']))}}
						</td>
						<td>
							{{$masjid['uraian']}}
						</td>
						<td >
							{{rupiah($masjid['masuk'])}}
						</td>
						<td>
							<a href="/masjid/masuk/edit/{{$masjid['masjid_id']}}" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<form action="/masjid/masuk/delete/{{$masjid['masjid_id']}}" method="POST" class="d-inline">
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

@section('script')
		
@if (session()->has('success'))
<script>
	Swal.fire({title: {{session('success')}},text: '',icon: 'success',confirmButtonText: 'OK'
	})
	</script>
@endif



@endsection