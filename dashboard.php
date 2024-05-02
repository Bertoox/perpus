<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peminjaman Perpustakaan</title>
</head>
<body>
    <h1>Dashboard Peminjaman Perpustakaan</h1>

    <h2>Status Peminjaman</h2>
    <table border="1">
        <tr>
            <th>ID Anggota</th>
            <th>Nama</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>
        <?php
            // Koneksi ke database
            $servername = "localhost";
            $username = "root";
            $password = ""; // Password kosong jika tidak diubah
            $database = "perpustakaan"; // Ganti dengan nama database yang Anda gunakan

            // Buat koneksi
            $conn = new mysqli($servername, $username, $password, $database);

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Ambil data dari tabel peminjaman
            $sql = "SELECT a.id_anggota, a.nama, b.judul, p.tgl_pinjam, p.tgl_kembali, p.status
                    FROM anggota a, buku b, peminjaman p
                    WHERE a.id_anggota = p.id_anggota AND b.id_buku = p.id_buku";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data dari database
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["id_anggota"]."</td>";
                    echo "<td>".$row["nama"]."</td>";
                    echo "<td>".$row["judul"]."</td>";
                    echo "<td>".$row["tgl_pinjam"]."</td>";
                    echo "<td>".$row["tgl_kembali"]."</td>";
                    echo "<td>".$row["status"]."</td>";
                    echo "</tr>";
                }
            } else {
                echo "Tidak ada data peminjaman.";
            }

            // Tutup koneksi
            $conn->close();
        ?>
    </table>

    <h2>Buku yang akan habis</h2>
    <table border="1">
        <tr>
            <th>ID Buku</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Jumlah Buku</th>
        </tr>
        <?php
            // Koneksi ke database
            $servername = "localhost";
            $username = "root";
            $password = ""; // Password kosong jika tidak diubah
            $database = "perpustakaan"; // Ganti dengan nama database yang Anda gunakan

            // Buat koneksi
            $conn = new mysqli($servername, $username, $password, $database);

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Ambil data dari tabel buku
            $sql = "SELECT id_buku, judul, penulis, jumlah_buku FROM buku WHERE jumlah_buku <= 5";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data dari database
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["id_buku"]."</td>";
                    echo "<td>".$row["judul"]."</td>";
                    echo "<td>".$row["penulis"]."</td>";
                    echo "<td>".$row["jumlah_buku"]."</td>";
                    echo "</tr>";
                }
            } else {
                echo "Tidak ada buku yang akan habis.";
            }

            // Tutup koneksi
            $conn->close();
        ?>
    </table>
</body>
</html>
 -->
