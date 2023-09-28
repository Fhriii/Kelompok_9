<?php
$link = mysqli_connect("localhost", "fahri", "1877", "db_kelompok9");

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$absen = $_POST['absen'];
$nis = $_POST['nis'];
$pass = $_POST['password'];
$foto = $_FILES['foto']['name'];

// ==================

$foto_file = $_FILES['foto']['name'];
$file_tmp = $_FILES['foto']['tmp_name'] ;
move_uploaded_file($file_tmp, 'file/'.$foto_file);


// ==========

$sql = "UPDATE tb_data_siswa SET namaSiswa = '$nama', kelas = '$kelas', absen = '$absen', password = '$pass', foto = '$foto' WHERE nis = '$nis'";

if (mysqli_query($link, $sql)) {
    echo "<div style='text-align: center; margin-top: 50px;'>";
    echo "<h1>Data berhasil disimpan di daftar.</h1>";
    echo "<br><button style='background-color: green;width: 125px;height: 40px;border-radius: 20px;'><a style='text-decoration: none;color: white;'href='datasiswaguru.php'>LIHAT DATA</a></button>";
    echo "</div>";

    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);
?>

