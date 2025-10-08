<html>
<head>
    <title>Hitung Diskon Toko Pakaian</title>
</head>
<body>
    <h2>Program Hitung Diskon Toko Pakaian</h2>
    <form method="post">
        <label>Jumlah Barang: </label>
        <input type="number" name="jumlah" required><br><br>

        <label>Harga per Barang (Rp): </label>
        <input type="number" name="harga" required><br><br>

        <input type="submit" value="Hitung">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jumlah = $_POST["jumlah"];
        $harga = $_POST["harga"];
        $total = $jumlah * $harga;

        $voucher = 0;
        $diskonUtama = (15 / 100) * $total; // diskon tetap 15%
        $diskonTambahan = 0;

        if ($total > 300000) {
            // Diskon tambahan 20% jika lebih dari 300 ribu
            $diskonTambahan = (20 / 100) * $total;
            $voucher = 50000;
        }

        // Total bayar setelah diskon utama dan tambahan
        $total_bayar = $total - $diskonUtama - $diskonTambahan;

        echo "<h3>Hasil Perhitungan:</h3>";
        echo "Jumlah Barang: " . $jumlah . "<br>";
        echo "Harga per Barang: Rp " . number_format($harga, 0, ',', '.') . "<br>";
        echo "Total Belanja: Rp " . number_format($total, 0, ',', '.') . "<br><br>";

        echo "Diskon Utama (15%): Rp " . number_format($diskonUtama, 0, ',', '.') . "<br>";
        echo "Diskon Tambahan (20% jika > Rp 300.000): Rp " . number_format($diskonTambahan, 0, ',', '.') . "<br><br>";

        echo "Total Bayar: Rp " . number_format($total_bayar, 0, ',', '.') . "<br>";
        echo "Voucher Belanja: Rp " . number_format($voucher, 0, ',', '.');
    }
    ?>
</body>
</html>