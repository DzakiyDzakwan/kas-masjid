@extends('layout.main')

@section('content')
<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-edit"></i> Ubah Data</h3>
  </div>
  <form action="/users/edit" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="card-body">

    <input type='hidden' class="form-control" name="id" value="{{$user['id']}}" readonly/>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama User</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="nama_pengguna" name="nama" value="{{$user['nama']}}"/>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="username" name="username" value="{{$user['username']}}"/>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" id="pass" name="password" value=""/>
          <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Confirm Password</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" id="pass2" name="password_confirmation" value=""/>
          <input id="mybutton2" onclick="change2()" type="checkbox" class="form-checkbox"> Lihat Password
        </div>
      </div>

      {{-- <div class="form-group row">
        <label class="col-sm-2 col-form-label">Level</label>
          <div class="col-sm-4">
              <select name="level" id="level" class="form-control">
                <option value="">-- Pilih Level --</option>
              </select>
          </div>
      </div> --}}
  
      <div class="card-footer">
        <input type="submit" name="Ubah" value="Simpan" class="btn btn-success" >
        <a href="?page=MyApp/data_pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
      </div>

    </form>
  </div>
@endsection

@section('script')
<script type="text/javascript">
  function change()
  {
  var x = document.getElementById('pass').type;
  var y = document.getElementById('pass').type;

  if (x == 'password')
  {
      document.getElementById('pass').type = 'text';
      document.getElementById('mybutton').innerHTML;
  }
  else
  {
      document.getElementById('pass').type = 'password';
      document.getElementById('mybutton').innerHTML;
  }
  }

  function change2()
  {
  var x = document.getElementById('pass2').type;
  var y = document.getElementById('pass2').type;

  if (x == 'password')
  {
      document.getElementById('pass2').type = 'text';
      document.getElementById('mybutton2').innerHTML;
  }
  else
  {
      document.getElementById('pass2').type = 'password';
      document.getElementById('mybutton2').innerHTML;
  }
  }
</script>
@endsection
