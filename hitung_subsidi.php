<!DOCTYPE html>
<html>
<head>
    <title>Hitung Subsidi Pendidikan</title>
</head>
<body>
    <h2>Program Hitung Subsidi Pendidikan</h2>
    <form method="post">
        <label>Jumlah Anak Usia Sekolah (6-17 tahun):</label><br>
        <input type="number" name="anak" required><br><br>

        <label>Penghasilan per Bulan (Rp):</label><br>
        <input type="number" name="penghasilan" required><br><br>

        <label>Konsumsi Listrik per Bulan (Rp):</label><br>
        <input type="number" name="listrik" required><br><br>

        <input type="submit" value="Hitung Subsidi">
    </form>

    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $anak = $_POST['anak'];
        $penghasilan = $_POST['penghasilan'];
        $listrik = $_POST['listrik'];

        $subsidiAnak = 0;
        $bantuanSosial = 0;
        $totalSubsidi = 0;

        // cek apakah keluarga tidak mampu
        if ($penghasilan < 1000000 && $listrik < 100000) {
            // keluarga tidak mampu
            $subsidiAnak = $anak * 60000;
            $bantuanSosial = 100000;
            $totalSubsidi = $subsidiAnak + $bantuanSosial;
            echo "<b>Keluarga termasuk Tidak Mampu</b><br>";
        } else {
            // keluarga mampu
            $subsidiAnak = $anak * 50000;
            $bantuanSosial = 0;
            $totalSubsidi = $subsidiAnak;
            echo "<b>Keluarga termasuk Mampu</b><br>";
        }

        echo "Jumlah Anak: $anak <br>";
        echo "Penghasilan: Rp " . number_format($penghasilan,0,",",".") . "<br>";
        echo "Konsumsi Listrik: Rp " . number_format($listrik,0,",",".") . "<br><br>";

        echo "Subsidi Anak: Rp " . number_format($subsidiAnak,0,",",".") . "<br>";
        echo "Bantuan Sosial: Rp " . number_format($bantuanSosial,0,",",".") . "<br>";
        echo "<h3>Total Subsidi: Rp " . number_format($totalSubsidi,0,",",".") . "</h3>";
    }
    ?>
</body>
</html>