<!DOCTYPE html>
<html>
<head>
    <title>Absensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #042843;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #0080ff;
            margin-bottom: 20px;
        }

        form {
            text-align: left;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        select {
            height: 40px;
        }

        button[type="submit"] {
            background-color: #0080ff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #0055cc;
        }  
    </style>
</head>
<body>
    <div class="container">
        <h2>Absensi</h2>
        <form action="proses.php" method="post">
            <label for="namaSiswa">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="nis">NIS:</label>
            <input type="number" id="nis" name="nis" required>

            <label for="tgl">Tanggal:</label>
            <input type="date" id="tgl" name="tanggal">

            <label for="kehadiran">Kehadiran:</label>
            <select name="kehadiran" id="kehadiran">
                <option value="Hadir">Hadir</option>
                <option value="Tidak Hadir">Tidak Hadir</option>
            </select>

            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
