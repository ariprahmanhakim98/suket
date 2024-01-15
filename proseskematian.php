<?php
include 'koneksi.php';

$jns = $_POST['jenis_post'];
$no_surat = $_POST['no_surat'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$hari = $_POST['hari'];
$tanggal = $_POST['tanggal'];
$sebab = $_POST['sebab'];
$tempat = $_POST['tempat'];
$pelapor = $_POST['pelapor'];

if($jns != 'edit'){
    $query = "INSERT INTO data_kematian (no_surat, nik, nama, tanggal_lahir, jenis_kelamin, agama, hari, tanggal, sebab, tempat, pelapor, status) 
    VALUES ('$no_surat', '$nik', '$nama', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$hari', '$tanggal', '$sebab', '$tempat', '$pelapor', '0')";
} else {
    $query = "UPDATE data_kematian SET nik = '$nik', nama = '$nama', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', hari = '$hari', tanggal = '$tanggal', sebab = '$sebab', tempat = '$tempat', pelapor = '$pelapor' WHERE id = " . $_POST['id_kematian'];
}

if ($koneksi->query($query) === TRUE) {
    header("Location: inputdatakematian.php?status=1");
    exit();
} else {
    header("Location: inputdatakematian.php?status=null");
    exit();
}

$koneksi->close();
?>