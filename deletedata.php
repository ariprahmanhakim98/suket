<?php
include 'koneksi.php';

$id = $_GET['id'];
$tabel = $_GET['tabel'];

$query = "DELETE FROM $tabel WHERE id = $id";
$data = str_replace('_', '', $tabel);

if ($koneksi->query($query) === TRUE) {
    header("Location: rekapitulasi{$data}.php?status=delete_success");
    exit();
} else {
    echo "Error: " . $query . "<br>" . $koneksi->error;
}

$koneksi->close();
?>