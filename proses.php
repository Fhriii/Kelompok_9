<?php
$link = mysqli_connect("localhost", "fahri", "1877", "db_kelompok9");

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}


$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$nis = $_POST['nis'];
$kehadiran = $_POST['kehadiran'];

$sql = "INSERT INTO absensi (nis, nama_siswa, tanggal, kehadiran) VALUES ('$nis','$nama','$tanggal','$kehadiran')";
$stmt = mysqli_prepare($link, $sql);

mysqli_stmt_bind_param($stmt, "issi", $nis, $nama, $tanggal, $kehadiran);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>
            alert('Data berhasil disimpan di tabel siswa.');
            window.location.href = 'datasiswa.php';
          </script>";
} else {
    echo "<div style='text-align: center; margin-top: 50px;'>";
    echo "<h3>Sepertinya ada error:<br> isikan nama atau nis yang benar</h3>" ;
    echo "<br><br><button style='background-color: blue; width: 125px; height: 40px; border-radius: 20px;'>
          <a style='text-decoration: none; color: white;' href='absensi_siswa.php'>KEMBALI</a></button>";
    echo "</div>";

}

mysqli_stmt_close($stmt);
mysqli_close($link);
?>
