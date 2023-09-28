<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Siswa</title>
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
    
        $query = "INSERT INTO tb_data_siswa(`id`, `namaSiswa`, `nis`, `absen`, `kelas`, `foto`) VALUES (0, '$nama', '$nis', '$absen','$kelas','$foto')";
        
        if (mysqli_query($conn, $query)) {
            echo "Data tersimpan";
        } else {
            echo "Data gagal tersimpan: " . mysqli_error($conn);
        }
    
    }
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
        $deleteId = $_POST['delete_id'];
        $deleteQuery = "DELETE FROM tb_data_siswa WHERE id = $deleteId";
        
        if (mysqli_query($conn, $deleteQuery)) {
            echo "<span class='yellow'>Data berhasil dihapus</span>";
        } else {
            echo "<span class='yellow'>Data gagal dihapus: </span>" . mysqli_error($conn);
        }
    }
    
    
    $sql = "SELECT * FROM tb_data_siswa";

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<h1><span class='blue'></span>Data<span class='blue'></span> <span class='yellow'>Siswa</span></h1>";
            echo '<button style="margin-left:140px;background-color: #4CAF50; border-radius:10px;"><a style="text-decoration:none;color:white"href="formTambah.php">Tambah</a></button>';
	    echo '<button style="margin-left:10	px;background-color: red; border-radius:10px;"><a style="text-decoration:none;color:white"href="index.html">Keluar</a></button>';


            echo "<table class='container'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th><h1>Nama</h1></th>";
            echo "<th><h1>Kelas</h1></th>";
            echo "<th><h1>Absen</h1></th>";
            echo "<th><h1>Nis</h1></th>";
            echo "<th><h1>Password</h1></th>";
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
	    echo "<td>" . $row['password'] . "</td>";
            echo "<td>";
            echo "<a href='file/{$row['foto']}' target='_blank'>";
            echo "<img src='file/{$row['foto']}' style='width: 100px;'>";
            echo "</a>";
            echo "</td>";

            echo "<td>
                    <button style='background-color: red;border-radius:10px;'><a href='hapus.php?id={$row['id']}' style='text-decoration:none;color:white' onclick=\"return confirm('anda yakin ingin hapus data ini?');\">Hapus</a></button>            
                    <button style='background-color: yellow; color: black; border-radius: 10px;'><a href='update.php?id={$row['id']}' style='text-decoration: none; color: black;' >Update</a></button>
       
                </td>";
            echo "</tr>";

            }
           echo "</tbody>";
           echo "</table>";
           mysqli_free_result($result);
        } else {
            echo " <br><br><br>Tidak ada data yang cocok.";
            echo '<button style="margin-left:140px;background-color: #4CAF50; border-radius:10px;"><a style="text-decoration:none;color:white"href="formTambah.php">Tambah</a></button>';
        }
    } else {
        echo "ERROR: Tidak dapat menjalankan query $sql. " . mysqli_error($conn);
    }
    
    // Tabel Absensi
    $sqlAbsensi = "SELECT nis,nama_siswa,tanggal,kehadiran, DATEDIFF(`tanggal`, CURDATE()) AS diff    FROM absensi ORDER BY tanggal DESC;
";

    if ($resultAbsensi = mysqli_query($conn, $sqlAbsensi)) {
        if (mysqli_num_rows($resultAbsensi) > 0) {
            echo "<h1><span class='blue'></span>Data<span class='blue'></span> <span class='yellow'>Absensi</span></h1>";
            echo "<table class='container'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th><h1>NIS</h1></th>";
            echo "<th><h1>Nama</h1></th>";
            echo "<th><h1>Tanggal</h1></th>";
            echo "<th><h1>Kehadiran</h1></th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($resultAbsensi)) {
                echo "<tr>";
                echo "<td>" . $row['nis'] . "</td>";
                echo "<td>" . $row['nama_siswa'] . "</td>";
                echo "<td>" . $row['tanggal'] . "</td>";
                echo "<td>" . $row['kehadiran'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            mysqli_free_result($resultAbsensi);
        } else {
            echo " <br>Tidak ada data absensi yang cocok.";
            echo '<button style="margin-left:140px;background-color: #4CAF50; border-radius:10px;"><a style="text-decoration:none;color:white"href="absensi_siswa.php">Tambah</a></button>';
        }
    } else {
        echo "ERROR: Tidak dapat menjalankan query $sqlAbsensi. " . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
    ?>
</body>
</html>

