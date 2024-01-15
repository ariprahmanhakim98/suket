<?php
include 'koneksi.php';

$jns = $_POST['jenis_post'];
$no_surat = $_POST['no_surat'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$pekerjaan = $_POST['pekerjaan'];
$nama_usaha = $_POST['nama_usaha'];
$jenis_usaha = $_POST['jenis_usaha'];
$alamat_usaha = $_POST['alamat_usaha'];

// var_dump($_POST); die();

if($jns != 'edit'){
    $query = "INSERT INTO data_izinusaha (no_surat, nik, nama, tanggal_lahir, jenis_kelamin, agama, alamat, pekerjaan, nama_usaha, jenis_usaha, alamat_usaha, status) 
    VALUES ('$no_surat', '$nik', '$nama', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$pekerjaan', '$nama_usaha', '$jenis_usaha', '$alamat_usaha', '0')";
} else {
    $query = "UPDATE data_izinusaha SET nik = '$nik', nama = '$nama', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', alamat = '$alamat', pekerjaan = '$pekerjaan', nama_usaha = '$nama_usaha', jenis_usaha = '$jenis_usaha', alamat_usaha = '$alamat_usaha' WHERE id = " . $_POST['id_usaha'];
}

if ($koneksi->query($query) === TRUE) {
    header("Location: inputdataizinusaha.php?status=1");
    exit();
} else {
    header("Location: inputdataizinusaha.php?status=null");
    exit();
}

$koneksi->close();
?>