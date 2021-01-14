<?php

$mpdf = new \Mpdf\Mpdf([
  'mode' => 'utf-8',
  'format' => [210, 330],
  'orientation' => 'P'
]);

$isi =
  '<!DOCTYPE html>
<html>

<head>
    <title>Surat Izin Cuti</title>
</head>
<style>
@page {
  margin-top: 0cm;
  margin-bottom: 1cm;
  margin-left: 2cm;
  margin-right: 2cm;
}
</style>

<body>
<center><img src="assets/img/kopUmsu.jpg"></center>
<h4  align="center"><u>SURAT PERSETUJUAN IZIN</u>  <br>
Nomor: '.$cetak["id_cuti"].'/II.3/UMSU/D/2021</h4>

<p align="center"><i>Bismillahirrahmanirrahim</i></p>
<p align="justify">Meminati permohonan saudara/i '.$cetak["nama"].' tanggal '.date("d F Y", strtotime($cetak["tglPengajuan"])).' maka kami memberi izin tidak masuk kerja kepada saudara/i:</p>
<table>
<thead>
  <tr>
    <td style="text-align: left; ">Nama</td>
    <td style="text-align: left; ">:</td>
    <td style="text-align: left; ">'.$cetak["nama"].'</td>
  </tr>
</thead>
<tbody>
  <tr>
   <td style="text-align: left; ">Jabatan</td>
    <td style="text-align: left; ">:</td>
    <td style="text-align: left; ">'.$cetak["jabatan"].'</td>
  </tr>
  <tr>
  <td style="text-align: left; ">Unit Kerja</td>
   <td style="text-align: left; ">:</td>
   <td style="text-align: left; ">'.$cetak["unitKerja"].'</td>
 </tr>

 <tr>
  <td style="text-align: left; ">Jenis Cuti</td>
   <td style="text-align: left; ">:</td>
   <td style="text-align: left; ">'.$cetak["jenisCuti"].'</td>
 </tr>
 <tr>
  <td style="text-align: left; ">Masa Izin</td>
   <td style="text-align: left; ">:</td>
   <td style="text-align: left; ">'.date("d F Y", strtotime($cetak["tglCuti"])).' s/d '.date("d F Y", strtotime($cetak["tglSelesaiCuti"])).' ('.$cetak["cutiDiambil"].' Hari Kerja)</td>
 </tr>
</tbody>
</table>
<p align="justify">Setelah berakhirnya masa izin diharapkan saudara/i kembali aktif melaksanakan tugas di Universitas Muhammadiyah Sumatera Utara <br> Demikian hal ini kami sampaikan, atas perhatiannya ksmi ucapkan terimakasih.</p>
<table>
    <thead>
      <tr>

        <td style="text-align: left; width:400px "><br><b></b></td>
        <td style="text-align: left; ">Medan, '.date("d F Y").'<br><center>a.n Rektor<br>Wakil Rektor II</center></td>
        
      </tr>
   
    </thead>
    <tbody>
    <tr>
    <td></td>
    <td><center><img src="assets/img/ttd_wr2.jpg" style="width:150px;"></center></td>
    </tr>
    
      <tr>
        <td style="text-align: left;"><b><u></u></b></td>
        <td style="text-align: left;"><b><u>Assoc. Prof. Dr. Akrim, M.Pd.</u></b><br><center>NIDN. 0122127902</center></td>
      </tr>
    </tbody>
  </table>
</body>
</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($isi);
$mpdf->Output();
