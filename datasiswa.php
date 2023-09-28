<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $server = "localhost";
    $username = "10_Elang";
    $password = "qooq";
    $database = "db_kelompok9";
    $conn = mysqli_connect($server, $username, $password, $database);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $nama = $_POST['namaSiswa'];
        $nis = $_POST['nis'];
        $absen = $_POST['absen'];
        $kelas = $_POST['kelas'];
        $foto = $_POST['foto'];
        
    }
    
    $sql = "SELECT namaSiswa,kelas,absen,nis,foto FROM tb_data_siswa";

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<h1><span class='blue'></span>Data<span class='blue'></span> <span class='yellow'>Siswa</span></h1>";
	     echo '<button style="margin-left:140px;background-color: red; border-radius:10px;"><a style="text-decoration:none;color:white"href="index.html">Keluar</a></button>';

            echo "<table class='container'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th><h1>Nama</h1></th>";
            echo "<th><h1>Kelas</h1></th>";
            echo "<th><h1>Absen</h1></th>";
            echo "<th><h1>Nis</h1></th>";
            echo "<th><h1>Foto</h1></th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['namaSiswa'] . "</td>";
            echo "<td>" . $row['kelas'] . "</td>";
            echo "<td>" . $row['absen'] . "</td>";
            echo "<td>" . $row['nis'] . "</td>";
             echo "<td>";
	echo "<a href='file/{$row['foto']}' target='_blank'>";
	echo "<img src='file/{$row['foto']}' style='width: 100px;'>";
	echo "</a>";
	echo "</td>";
            echo "</tr>";
            }
        
           echo "</tbody>";
           echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "Tidak ada data yang cocok.";
    }
    } else {
    echo "ERROR: Tidak dapat menjalankan query $sql. " . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
        ?>
</body>
</html>