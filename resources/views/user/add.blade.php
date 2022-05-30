@extends('layout.main')

@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-edit"></i> Tambah Data Admin</h3>
  </div>
  <form action="/users/store" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama User</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="nama_pengguna" name="nama" placeholder="Nama user" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Confirm Password">
        </div>
      </div>

      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Level</label>
      <div class="col-sm-4">
          <select name="level" id="level" class="form-control">
              <option>- Pilih -</option>
              <option value="admin">Administrator</option>
              <option value="bendahara">Bendahara</option>
          </select>
      </div>
      </div>

    </div>
    <div class="card-footer">
      <input type="submit" name="Simpan" value="Simpan" class="btn btn-info" >
      <a href="/users" title="Kembali" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>
@endsection