<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM data_pengguna WHERE user = '$username' AND password='$password'";
$result = $koneksi->query($query);

// echo $query; die();

if ($result->num_rows > 0) {
    session_start();
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $username;
    $_SESSION['level'] = $row['level'];
    header("Location: index.php");
    exit();
} else {
    header("Location: login.php?status=failed");
    exit();
}

$koneksi->close();
?>