<?php

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [330, 210],
'default_font_size' => 10,]);

$isi =
  '<!DOCTYPE html>
<html>

<head>
    <title>Surat Izin Cuti</title>
</head>
<style>
@page {
  margin-top: 1cm;
  margin-bottom: 1cm;
  margin-left: 1cm;
  margin-right: 1cm;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

p {
  font-size:10px;
}
</style>

<body>

<h3 align="center">Laporan Izin '.$jns.'<br>
Dari Tanggal '.date("d F Y", strtotime($tgl1)).' s/d '.date("d F Y", strtotime($tgl2)).' </h3>

<table>
  <tr>
    <th>No</th>
    <th>No. Surat</th>
		<th>Nama</th>
		<th>Jabatan</th>
		<th>Unit Kerja</th>
		<th>Jenis Cuti</th>
		<th>Ambil Cuti</th>
		<th>Tgl Cuti</th>
		<th>Tgl Selesai</th>
		<th>Ket.</th>
	</tr>';

	$i = 1;
 foreach ($cetak as $ct) :

$isi .='
  <tr>
    <td>'.$i.'</td>
    <td>'.$ct["id_cuti"].'</td>
		<td>'.$ct["nama"].'</td>
		<td>'.$ct["jabatan"].'</td>
		<td>'.$ct["unitKerja"].'</td>
		<td>'.$ct["jenisCuti"].'</td>
		<td>'.$ct["cutiDiambil"].'</td>
		<td>'.date("d F Y", strtotime($ct["tglCuti"])).'</td>
    <td>'.date("d F Y", strtotime($ct["tglSelesaiCuti"])).'</td>
		<td>'.$ct["alasan"].'</td>
	</tr>';
	$i++;
endforeach;
$isi.='</table>



</body>
</html>';

$mpdf->WriteHTML($isi);
$mpdf->Output();
