<?php
session_start();

if(isset($_SESSION['username'])) {
    echo "Hai, " . $_SESSION['username'] . "!";
} else {
    header("Location: login.php"); // Arahkan ke halaman login jika belum login
    exit();
}
?>
