@extends('layout.main')


@section('content')

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data User</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="/users/add" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama User</th>
						<th>Username</th>
						<th>Level</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($data as $user)
					<tr>
						<td>
							{{$loop->iteration}}
						</td>
						<td>
							{{$user['nama']}}
						</td>
						<td>
							{{$user['username']}}
						</td>
						<td >
							{{$user['level']}}
						</td>
						<td>
							<a href="/users/edit/{{$user['id']}}" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<form action="/users/delete/{{$user['id']}}" method="POST" class="d-inline">
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