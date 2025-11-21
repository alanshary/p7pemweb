<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Praktikum 7</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .container { width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        label { display: block; margin-bottom: 5px; margin-top: 10px; }
        input, select { width: 100%; padding: 8px; box-sizing: border-box; }
        button { margin-top: 15px; padding: 10px; width: 100%; background-color: #28a745; color: white; border: none; cursor: pointer; }
        .result { margin-top: 20px; padding: 15px; background-color: #f9f9f9; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Program Biodata & Gaji</h2>
        <form method="post">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>

            <label for="tgl_lahir">Tanggal Lahir:</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" required>

            <label for="pekerjaan">Pekerjaan:</label>
            <select name="pekerjaan" id="pekerjaan">
                <option value="Manager">Manager</option>
                <option value="Programmer">Programmer</option>
                <option value="Staff">Staff Admin</option>
                <option value="Desainer">Desainer</option>
            </select>

            <button type="submit" name="submit">Kirim Data</button>
        </form>

        <?php
        // Cek apakah form sudah disubmit
        if (isset($_POST['submit'])) {
            // 1. Ambil data dari form
            $nama = $_POST['nama'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $pekerjaan = $_POST['pekerjaan'];

            // 2. Menghitung Umur
            $lahir = new DateTime($tgl_lahir);
            $hari_ini = new DateTime();
            $diff = $hari_ini->diff($lahir);
            $umur = $diff->y; // Mengambil tahun dari selisih

            // 3. Menentukan Gaji berdasarkan Pekerjaan (Kondisi Switch) [cite: 303]
            $gaji = 0;
            switch ($pekerjaan) {
                case 'Manager':
                    $gaji = 15000000;
                    break;
                case 'Programmer':
                    $gaji = 10000000;
                    break;
                case 'Desainer':
                    $gaji = 8000000;
                    break;
                case 'Staff':
                    $gaji = 5000000;
                    break;
                default:
                    $gaji = 0;
            }

            // 4. Tampilkan Output
            echo "<div class='result'>";
            echo "<h3>Hasil Perhitungan:</h3>";
            echo "<p><strong>Nama:</strong> $nama</p>";
            echo "<p><strong>Tanggal Lahir:</strong> " . date('d F Y', strtotime($tgl_lahir)) . "</p>";
            echo "<p><strong>Umur:</strong> $umur Tahun</p>";
            echo "<p><strong>Pekerjaan:</strong> $pekerjaan</p>";
            echo "<p><strong>Gaji:</strong> Rp " . number_format($gaji, 0, ',', '.') . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>