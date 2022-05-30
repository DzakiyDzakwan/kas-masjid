@include('components.rupiah')

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Laporan Kas Sosial</title>
</head>
<body>
<center>
<h2>Laporan Rekapitulasi Kas Sosial</h2>
<h3>Sosial Darul 'Ilmi Universitas Muria Kudus</h3>
<p>Periode : {{date("d-M-Y", strtotime($date1))}} s/d {{date("d-M-Y", strtotime($date2))}} </p>
<p>________________________________________________________________________</p>

  <table border="1" cellspacing="0">
    <thead>
      <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Uraian</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($data as $sosial)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td> {{date("d/M/Y", strtotime($sosial['tgl_kas']))}}</td> 
            <td>{{$sosial['uraian']}}</td>
            <td align="right">{{rupiah($sosial['masuk'])}}</td>  
            <td align="right">{{rupiah($sosial['keluar'])}}</td>   
        </tr>
        @endforeach
    </tbody>
    <tr>
        <td colspan="3">Total Pemasukan</td>
        <td colspan="2">{{rupiah($saldoMasuk)}}</td>
    </tr>
    <tr>
        <td colspan="4">Total Pengeluaran</td>
        <td>{{rupiah($saldoKeluar)}}</td>
    </tr>
    <tr>
        <td colspan="3">Saldo Kas Sosial</td>
        <td colspan="2">{{rupiah($saldoSosial)}}</td>
    </tr>
  </table>
</center>

<script>
    window.print();
</script>
</body>
</html>