<html>
<head>
    <title>Hitung Total Gaji</title>
</head>
<body>
    <h2>Program Hitung Total Gaji Karyawan</h2>
    <form method="post">
        <label>Nama Karyawan:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Omset Penjualan (Rp):</label><br>
        <input type="number" name="omset" required><br><br>

        <label>Gaji Pokok (Rp):</label><br>
        <input type="number" name="gaji_pokok" required><br><br>

        <input type="submit" name="hitung" value="Hitung">
    </form>

    <hr>

    <?php
    if (isset($_POST['hitung'])) {
        $nama = $_POST['nama'];
        $omset = $_POST['omset'];
        $gaji_pokok = $_POST['gaji_pokok'];

        // Inisialisasi bonus
        $bonus = 0;

        // Cek kondisi omset
        if ($omset > 100000000) { 
            $bonus = 0.01 * $omset; // 1% dari omset
        }

        // Hitung total gaji
        $total_gaji = $gaji_pokok + $bonus;

        echo "<h3>Hasil Perhitungan</h3>";
        echo "Nama Karyawan: <b>$nama</b><br>";
        echo "Omset Penjualan: Rp " . number_format($omset, 0, ',', '.') . "<br>";
        echo "Gaji Pokok: Rp " . number_format($gaji_pokok, 0, ',', '.') . "<br>";
        echo "Bonus: Rp " . number_format($bonus, 0, ',', '.') . "<br>";
        echo "Total Gaji: <b>Rp " . number_format($total_gaji, 0, ',', '.') . "</b><br>";
    }
    ?>
</body>
</html>