<?php
include 'koneksi.php';
$id = $_GET["id"];
$foto = $_GET["foto"];

if (!empty("file/".$foto)) {
    if (file_exists('file/'.$foto)) {
        if (unlink('file/'.$foto)) {
            echo "File berhasil dihapus.";
        } else {
            echo "Gagal menghapus file.";
        }
    } else {
        echo "File tidak ditemukan.";
    }
} else {
    echo "Path file tidak valid.";
}
$query = "DELETE FROM tb_data_siswa WHERE id='$id' ";
$hasil_query = mysqli_query($koneksi, $query);

if(!$hasil_query) {
    die ("Gagal menghapus data: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil dihapus.');window.location='datasiswaguru.php';</script>";
}
?>
