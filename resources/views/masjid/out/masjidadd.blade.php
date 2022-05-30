@extends('layout.main')

@section('content')
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Pengeluaran</h3>
	</div>
	<form action="/masjid/keluar/store" method="post" enctype="multipart/form-data">
		@csrf
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Uraian</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="uraian_km" name="uraian_km" placeholder="Uraian Pengeluaran" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pengeluaran</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="masuk" name="keluar" placeholder="Jumlah Pengeluaran" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-4">
					<input type="date" class="form-control" id="tgl_km" name="tgl_km" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="/masjid/masuk" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>
@endsection

@section('script')
<script type="text/javascript">
	var masuk = document.getElementById('masuk');
	masuk.addEventListener('keyup', function (e) {
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatmasuk() untuk mengubah angka yang di ketik menjadi format angka
		masuk.value = formatmasuk(this.value, 'Rp ');
	});

	/* Fungsi formatmasuk */
	function formatmasuk(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			masuk = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			masuk += separator + ribuan.join('.');
		}

		masuk = split[1] != undefined ? masuk + ',' + split[1] : masuk;
		return prefix == undefined ? masuk : (masuk ? 'Rp ' + masuk : '');
	}
</script>

@endsection