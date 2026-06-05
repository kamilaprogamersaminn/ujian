<?php
    include 'connect.php';

    // Mengatur zona waktu (misalnya Asia/Jakarta untuk WIB) agar waktu pembuatan nomor akurat
    date_default_timezone_set('Asia/Jakarta');

    // Membuat nomor pendaftaran otomatis: Tanggal(d) Bulan(m) Tahun 2 digit(y) Jam(H) Menit(i) Detik(s)
    $nomor_otomatis = "PPDB-" . date('Ymd-His');

    if(isset($_POST['simpan'])) {
        // Mengambil data dari POST, termasuk nomor pendaftaran otomatis
        $daftar    = mysqli_real_escape_string($conn, $_POST['nomor_daftar']);
        $nama      = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
        $jenis     = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
        $asal      = mysqli_real_escape_string($conn, $_POST['asal_sekolah']);
        $jurusan   = mysqli_real_escape_string($conn, $_POST['jurusan_pilihan']);
        $nomor     = mysqli_real_escape_string($conn, $_POST['nomor_telpon']);

        $query = "INSERT INTO siswa (nomor_daftar, nama_lengkap, jenis_kelamin, asal_sekolah, jurusan_pilihan, nomor_telpon) 
                  VALUES ('$daftar', '$nama', '$jenis', '$asal', '$jurusan', '$nomor')";
        
        if(mysqli_query($conn, $query)) {
            header("location: /data_siswa/dashboard.php");
            exit();
        } else {
            echo "Gagal menyimpan data: " . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Sekolah</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body> 
        <div class="container-form">       
                <div class="teks-judul">
                    📝 FORMULIR PENDAFTARAN SISWA BARU <br>
                    <span>SMK RIYADHUL ULUM UJUNGBATU</span>
                </div>
 
                <div class="garis-pembatas">------------------------------------------------------------------</div>

                <div class="petunjuk">
                    Silakan isi formulir di bawah ini menggunakan data asli kamu:
                </div>
                
                <form method="post">
                        <div class="input-group">
                            <label>Nomor Pendaftaran (Otomatis)</label>
                            <input type="text" name="nomor_daftar" value="<?php echo $nomor_otomatis; ?>" readonly>
                        </div>
                        
                        <div class="input-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" placeholder="Masukkan nama Anda" required>
                        </div>
                        
                        <div class="input-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" required>
                                <option value="">Pilih jenis Kelamin</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                            </select>
                        </div>
                        
                        <div class="input-group">
                            <label>Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" placeholder="Asal Sekolah Anda" required>
                        </div>
                        
                        <div class="input-group">
                            <label>Jurusan</label>
                            <select name="jurusan_pilihan" required>
                                <option value="">Pilih jurusan</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                <option value="Tata Busana">Tata Busana</option>
                                <option value="Teknik Sepeda Motor">Teknik Sepeda Motor</option>
                            </select>
                        </div>
                        
                        <div class="input-group">
                            <label>Nomor Telepon</label>
                            <input type="text" name="nomor_telpon" placeholder="Contoh: 082256179815" required>
                        </div>

                            <button type="submit" name="simpan" class="tombol">Konfirmasi</button>

                       <center> <a href="index.php">Kembali Ke Halaman Utama</a></center>
                </form>
        </div>
</body>
</html>