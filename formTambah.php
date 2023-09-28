<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            background-color: #042843;
        }

        h2 {
            color: white;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label, input,select{
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        input[type="submit"]{
            background-color: #042843;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Silahkan Masukkan Data Anda</h2>
    <form action="insrt.php" method="POST" enctype="multipart/form-data">
        <label for="nama">Nama :</label>
        <input type="text" id="nama" name="nama" required>
	<label for="kelas">Kelas :</label>
	<select id="kelas" name="kelas" required>
    		<option value="XI SIJA 1">XI SIJA 1</option>
    		<option value="XI SIJA 2">XI SIJA 2</option>
	</select>
        <label for="absen">Absen :</label>
        <input type="number" id="absen" name="absen" required>

        <label for="nis">Nis :</label>
        <input type="number" id="nis" name="nis" required>

        <label for="nis">Password :</label>
        <input type="text" id="password" name="password" required>

        <label for="foto">Foto Anda :</label>
        <input type="file" id="foto" name="foto">

        <input type="submit" value="Simpan">
    </form>
</body>
</html>
