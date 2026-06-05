<?php
    include '../connect.php';

    // 1.Fitur Pencarian
    $keyword = "";
    if (isset($_GET['search'])) {
        $keyword = mysqli_real_escape_string($conn, $_GET['search']);
        $query_tabel = "SELECT * FROM siswa WHERE 
                        nama_lengkap LIKE '%$keyword%' OR 
                        nomor_daftar LIKE '%$keyword%' OR 
                        asal_sekolah LIKE '%$keyword%' OR
                        jenis_kelamin LIKE '%$keyword%' OR
                        jurusan_pilihan LIKE '%$keyword%'";
    } else {
        $query_tabel = "SELECT * FROM siswa";
    }
    
    $data = mysqli_query($conn, $query_tabel);

    // 2. Perhitungan Otomatis
    $siswa_all = mysqli_query($conn, "SELECT * FROM siswa");
    $total_siswa = mysqli_num_rows($siswa_all);

    $siswa_rpl = mysqli_query($conn, "SELECT * FROM siswa WHERE jurusan_pilihan LIKE '%Rekayasa Perangkat Lunak%' OR jurusan_pilihan LIKE '%RPL%'");
    $total_rpl = mysqli_num_rows($siswa_rpl);

    $siswa_tb = mysqli_query($conn, "SELECT * FROM siswa WHERE jurusan_pilihan LIKE '%Tata Busana%' OR jurusan_pilihan LIKE '%TB%'");
    $total_tb = mysqli_num_rows($siswa_tb);

    $siswa_tsm = mysqli_query($conn, "SELECT * FROM siswa WHERE jurusan_pilihan LIKE '%Teknik Sepeda Motor%' OR jurusan_pilihan LIKE '%TSM%'");
    $total_tsm = mysqli_num_rows($siswa_tsm);

    $user_all = mysqli_query($conn, "SELECT * FROM user");
    $total_user = $user_all ? mysqli_num_rows($user_all) : 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/data.css">
</head>
<body>
    <div class="container">

        <div style="text-align: center; margin-bottom: 30px;">
            <h2 style="color: #5c82ea; font-weight: 700; font-size: 22px; text-transform: uppercase; letter-spacing: 0.5px;">Rekapan Pendaftaran Calon Siswa</h2>
            <p style="color: #73a4d4; font-size: 13px; margin-top: 5px;">SMK Riyadhul Ulum Ujungbatu</p>
        </div>

        <div class="navbar">
            <div class="menu">
                <b>ADMIN-PANEL</b>
                <a href="../keluar.php">Kelola Keluar</a>
                <a href="../index.php">Beranda Utama</a>
                <a href="../admin/admin.php">Kelola Admin</a>
                <a href="../data_siswa/data_siswa.php">Perekapan Data Siswa</a>
            </div>
        </div><br><br>

        <div class="dashboard-cards">
            <div class="stat-card">
                <div class="stat-content">
                    <h2><?= $total_siswa ?></h2>
                    <p>Total Pendaftar</p>
                </div>
                <div class="stat-icon bg-blue">
                    <i class="fa fa-users"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-content">
                    <h2><?= $total_rpl ?></h2>
                    <p>Total Siswa RPL</p>
                </div>
                <div class="stat-icon bg-green">
                    <i class="fa fa-laptop-code"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-content">
                    <h2><?= $total_tb ?></h2>
                    <p>Total Tata Busana</p>
                </div>
                <div class="stat-icon bg-orange">
                    <i class="fa fa-scissors"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-content">
                    <h2><?= $total_tsm ?></h2>
                    <p>Total Siswa TSM</p>
                </div>
                <div class="stat-icon bg-red">
                    <i class="fa fa-motorcycle"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-content">
                    <h2><?= $total_user ?></h2>
                    <p>Total siswa System</p>
                </div>
                <div class="stat-icon bg-purple">
                    <i class="fa fa-user-shield"></i>
                </div>
            </div>
        </div>

        <form action="" method="GET" class="search-container">
            <input type="text" name="search" class="search-input" placeholder="Cari nama, nomor daftar, asal sekolah..." value="<?= htmlspecialchars($keyword) ?>">
            <button type="submit" class="btn-cari"><i class="fa fa-search"></i> Cari</button>
            <?php if (!empty($keyword)): ?>
                <a href="data_siswa.php" class="btn-reset-pencarian">Reset</a>
            <?php endif; ?>
        </form>

        <div style="margin-bottom: 15px;">
            <a href="tambah1.php" style="display: inline-block; background-color: #5c82ea; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px; font-weight: 600;">+ Tambah</a>
        </div>

        <div class="table">
            <table border="1" width="100%" cellpadding="10" style="border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nomor Pendaftaran</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Asal Sekolah</th>
                        <th>Jurusan</th>
                        <th>Nomor Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (mysqli_num_rows($data) > 0) {
                            while($item = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td><?= $item['id']; ?></td>
                        <td><span class="badge-no"><?= $item['nomor_daftar']; ?></span></td>
                        <td class="nama-siswa"><?= $item['nama_lengkap']; ?></td>
                        <td><?= $item['jenis_kelamin']; ?></td>
                        <td><?= $item['asal_sekolah']; ?></td>
                        <td><?= $item['jurusan_pilihan']; ?></td>
                        <td><?= $item['nomor_telpon']; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $item['id']; ?>">Edit</a> | 
                            <a href="hapus.php?id=<?= $item['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                        </td>
                    </tr>
                    <?php
                            }
                        } else {
                            echo "<tr><td colspan='8' style='text-align: center; color: red;'>Data siswa tidak ditemukan.</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>