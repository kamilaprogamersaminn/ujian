<?php
    include '../connect.php';

    $query = "SELECT * FROM siswa ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pendaftar - Berhasil</title>
    <link rel="stylesheet" href="../css/dash.css">
</head>
<body>
    <div class="dashboard-container">
        
        <div class="welcome-banner">
            <h1>🎉 Selamat, Pendaftaran Berhasil!</h1>
            <p>Akun Anda telah terbuat dan data pendaftaran Anda sudah aman tersimpan di dalam sistem database kami.</p>
        </div>

        <div class="table-header">
            <h2>Data Pendaftar Terbaru</h2>
            <p>Berikut adalah list pendaftar yang masuk ke dalam database:</p>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Daftar</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Asal Sekolah</th>
                        <th>Jurusan</th>
                        <th>Nomor Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td data-label='No'>" . $no++ . "</td>";
                            echo "<td data-label='Nomor Daftar'>" . htmlspecialchars($row['nomor_daftar']) . "</td>";
                            echo "<td data-label='Nama Lengkap'>" . htmlspecialchars($row['nama_lengkap']) . "</td>";
                            echo "<td data-label='Jenis Kelamin'>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                            echo "<td data-label='Asal Sekolah'>" . htmlspecialchars($row['asal_sekolah']) . "</td>";
                            echo "<td data-label='Jurusan'>" . htmlspecialchars($row['jurusan_pilihan']) . "</td>";
                            echo "<td data-label='Nomor Telepon'>" . htmlspecialchars($row['nomor_telpon']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>Belum ada data pendaftar.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="action-area">
            <a href="../index.php" class="btn-kembali">← Kembali ke Form</a>
        </div>

    </div>
</body>
</html>