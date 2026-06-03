<?php
    include 'connect.php';

    if(isset($_POST['simpan'])) {
        $Username    = mysqli_real_escape_string($conn, $_POST['Username']);
        $Email      = mysqli_real_escape_string($conn, $_POST['Email']);
        $Password     = mysqli_real_escape_string($conn, $_POST['Password']);

        $query = "INSERT INTO siswa (username, email, password) 
                  VALUES ('$Usernama, $Email, $Password )";
        
        if(mysqli_query($conn, $query)) {
            header("location: index.php");
            exit();
        } else {
            echo "Gagal menyimpan data: " . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB - SMK Riyadhul Ulum Ujungbatu</title>
    <link rel="stylesheet" href="css/index1.css">
</head>
<body>
    <nav>
        <div class="logo">SMK Riyadhul Ulum</div>
        <div class="menu">
            <a href="#home">Home</a>
            <a href="#jurusan">Jurusan</a>
            <a href="login.php">Login Admin</a>
        </div>
    </nav>

    <section class="hero" id="home">
        <h1>Penerimaan Siswa Baru <br><span>SMK Riyadhul Ulum</span></h1>
        <p>Membentuk Generasi Berkarakter, Terampil, dan Siap Kerja di Era Digital.</p>
        <a href="../index2.php" class="tombol">DAFTAR SEKARANG</a>
    </section>

    <section class="container" id="jurusan">
        <h2 class="judul-bagian">Jurusan Unggulan</h2>
        
        <div class="grid-project">
            <div class="kartu">
                <h3>Tata Busana</h3>
                <p>Mempelajari teknik mendesain, menjahit, pembuatan pola baju, hingga pengelolaan bisnis fashion/butik modern.</p>
            </div>

            <div class="kartu">
                <h3>Teknik Sepeda Motor</h3>
                <p>Fokus pada perawatan, perbaikan mesin, kelistrikan, dan diagnosis teknologi motor terkini siap kerja di bengkel resmi.</p>
            </div>

            <div class="kartu">
                <h3>Rekayasa Perangkat Lunak</h3>
                <p>Mempelajari koding, pembuatan aplikasi Android/iOS, desain website, database, dan logika algoritma komputer.</p>
            </div>

        </div>
    </section>

    <footer style="padding: 30px 10px; text-align: center; background-color: #111827; color: white;">
        <p style="font-weight: bold; margin-bottom: 5px;">SMK Riyadhul Ulum Ujungbatu</p>
        <p style="font-size: 13px; color: #9ca3af; margin-bottom: 15px;">Membuka Pendaftaran Tahun Ajaran 2026/2027</p>
        <hr style="border: 0; border-top: 1px solid rgba(255,255,255,0.1); width: 50%; margin: 0 auto 15px auto;">
        <p style="font-size: 12px; color: #6b7280;">&copy; 2026 PPDB SMK Riyadhul Ulum. All rights reserved.</p>
    </footer>

</body>
</html>