<?php
include 'koneksi.php';

$queryPenduduk = "SELECT COUNT(*) as total FROM data_penduduk";
$resultPenduduk = $koneksi->query($queryPenduduk);
$rowPndk = $resultPenduduk->fetch_assoc();
$dtpenduduk = $rowPndk['total'];

$queryKelahiran = "SELECT COUNT(*) as total FROM data_kelahiran";
$resultKelahiran = $koneksi->query($queryKelahiran);
$rowKel = $resultKelahiran->fetch_assoc();
$dtkelahiran = $rowKel['total'];

$queryKematian = "SELECT COUNT(*) as total FROM data_kematian";
$resultKematian = $koneksi->query($queryKematian);
$rowKem = $resultKematian->fetch_assoc();
$dtkematian = $rowKem['total'];

$queryUsaha = "SELECT COUNT(*) as total FROM data_izinusaha";
$resultUsaha = $koneksi->query($queryUsaha);
$rowUsaha = $resultUsaha->fetch_assoc();
$dtusaha = $rowUsaha['total'];

$querypindah = "SELECT COUNT(*) as total FROM data_pindah";
$resultpindah = $koneksi->query($querypindah);
$rowpindah = $resultpindah->fetch_assoc();
$dtpindah = $rowpindah['total'];

?>