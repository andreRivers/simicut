<?php

$mpdf = new \Mpdf\Mpdf([
  'mode' => 'utf-8',
  'format' => [210, 330],
  'orientation' => 'L'
]);

$isi =
  '<!DOCTYPE html>
<html>

<head>
    <title>Surat Izin Cuti</title>
</head>
<style>
@page {
  margin-top: 2cm;
  margin-bottom: 2cm;
  margin-left: 2cm;
  margin-right: 2cm;
}
</style>

<body>

<h2 align="center">Laporan Izin '.$jns.'<br>
Dari Tanggal '.date("d F Y", strtotime($tgl1)).' s/d '.date("d F Y", strtotime($tgl2)).' </h2>

</body>
</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($isi);
$mpdf->Output();
