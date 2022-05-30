@include('components.rupiah')

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Laporan Kas Masjid</title>
</head>
<body>
<center>
<h2>Laporan Rekapitulasi Kas Masjid</h2>
<h3>Masjid Darul 'Ilmi Universitas Muria Kudus</h3>
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

        @foreach ($data as $masjid)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td> {{date("d/M/Y", strtotime($masjid['tgl_kas']))}}</td> 
            <td>{{$masjid['uraian']}}</td>
            <td align="right">{{rupiah($masjid['masuk'])}}</td>  
            <td align="right">{{rupiah($masjid['keluar'])}}</td>   
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
        <td colspan="3">Saldo Kas Masjid</td>
        <td colspan="2">{{rupiah($saldoMasjid)}}</td>
    </tr>
  </table>
</center>

<script>
    window.print();
</script>
</body>
</html>