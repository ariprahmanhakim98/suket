<?php
include 'koneksi.php';

$jns = $_POST['jenis_post'];
$no_surat = $_POST['no_surat'];
$nama = $_POST['nama'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$tanggal = $_POST['tanggal'];
$sebab = $_POST['sebab'];
// $nik = $_POST['nik'];
// $hari = $_POST['hari'];
// $tempat = $_POST['tempat'];
// $pelapor = $_POST['pelapor'];

if($jns != 'edit'){
    $query = "INSERT INTO data_kematian (no_surat, nama, tanggal_lahir, jenis_kelamin, agama, tanggal_kematian, sebab_kematian, status) 
    VALUES ('$no_surat', '$nama', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$tanggal', '$sebab', '0')";
} else {
    $query = "UPDATE data_kematian SET nama = '$nama', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', tanggal_kematian = '$tanggal', sebab_kematian = '$sebab' WHERE id = " . $_POST['id_kematian'];
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