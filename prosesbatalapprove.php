<?php
include 'koneksi.php';

$id = $_GET['id'];
$tabel = $_GET['tabel'];

$query = "UPDATE $tabel SET status = 2 WHERE id = $id";

if ($koneksi->query($query) === TRUE) {
    header("Location: approve.php?status=batal_success");
    exit();
} else {
    echo "Error: " . $query . "<br>" . $koneksi->error;
}

$koneksi->close();
?>