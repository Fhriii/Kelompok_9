<?php
require 'koneksi.php'; 

$username = mysqli_real_escape_string($koneksi, $_POST["username"]);
$password = mysqli_real_escape_string($koneksi, $_POST["password"]); 
$query_sql = "SELECT * FROM tb_login_guru WHERE username='$username' AND password = '$password'";
$result = mysqli_query($koneksi, $query_sql);
if(mysqli_num_rows($result) > 0){
    session_start(); 
    $_SESSION['username'] = $username; 
    header("Location: datasiswaguru.php");
    exit();
} else {
   echo "<div style='text-align: center; margin-top: 50px;'>";
    echo "<h1>Nama pengguna atau kata sandi salah.</h1>";
    echo "<br><button style='background-color: green;width: 125px;height: 40px;border-radius: 20px;'><a style='text-decoration: none;color: white;'href='login_guru.php'>KEMBALI</a></button>";
    echo "</div>";
}
mysqli_close($koneksi);
?>
