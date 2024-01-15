<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $koneksi->query($query);

// echo $query; die();

if ($result->num_rows > 0) {
    session_start();
    $_SESSION['username'] = $username;
    header("Location: index.php");
    exit();
} else {
    header("Location: login.php?status=failed");
    exit();
}

$koneksi->close();
?>