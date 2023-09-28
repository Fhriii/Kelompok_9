<?php
$link = mysqli_connect("localhost", "fahri", "1877", "db_kelompok9");

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$nama = mysqli_real_escape_string($link, $_POST['nama']);
$kelas = mysqli_real_escape_string($link, $_POST['kelas']);
$absen = mysqli_real_escape_string($link, $_POST['absen']);
$nis = mysqli_real_escape_string($link, $_POST['nis']);
$pass = mysqli_real_escape_string($link, $_POST['password']);
$foto = mysqli_real_escape_string($link, $_FILES['foto']['name']);

// ==================

$foto_file = mysqli_real_escape_string($link, $_FILES['foto']['name']);
$file_tmp = $_FILES['foto']['tmp_name'] ;
move_uploaded_file($file_tmp, 'file/'.$foto_file);

// ==========

$sql = "INSERT INTO tb_data_siswa (namaSiswa, kelas, absen, nis, password, foto)  
        VALUES ('$nama', '$kelas', '$absen', '$nis', '$pass', '$foto')";

if (mysqli_query($link, $sql)) {
  echo "<div style='text-align: center; margin-top: 50px;'>";
    echo "<h1>Data berhasil disimpan di tabel data siswa.</h1>";
    echo "<br><button style='background-color: green;width: 125px;height: 40px;border-radius: 20px;'><a style='text-decoration: none;color: white;'href='datasiswaguru.php'>KEMBALI</a></button>";
    echo "</div>";

} else {
    echo "<div style='text-align: center; margin-top: 50px;'>";
    echo "Sepertinya ada error:<br>" . mysqli_error($link);
    echo "<br><br><button style='background-color: blue; width: 125px; height: 40px; border-radius: 20px;'>
          <a style='text-decoration: none; color: white;' href='formTambah.php'>KEMBALI</a></button>";
    echo "</div>";
}

mysqli_close($link);
?>
