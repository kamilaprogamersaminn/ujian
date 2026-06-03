<?php
    include '../connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
    <link rel="stylesheet" href="../css/edit.css">
</head>
<body>

    <div class="container">
        <div style="text-align: center; margin-bottom: 30px;">
            <h2 style="color: #1e3a8a; font-weight: 700; font-size: 22px; text-transform: uppercase; letter-spacing: 0.5px;">Pendaftaran Siswa Baru</h2>
            <p style="color: #627d98; font-size: 13px; margin-top: 5px;">Silakan lengkapi formulir di bawah ini dengan data yang valid</p>
        </div>

        <form method="post">
            <div class="input-group">
                <label>Nomor Pendaftaran</label>
                <input type="text" name="nomor_daftar" placeholder="Masukkan nomor pendaftaran Anda" required>
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
                <input type="text" name="nomor_telpon" placeholder="Nomor Telepon Anda" required>
            </div>

            <button type="submit" name="simpan" class="btn-kirim">KIRIM PENDAFTARAN</button>
        </form>
    </div>

</body>
</html>

<?php
    if(isset($_POST['simpan'])) {
        mysqli_query($conn, "INSERT INTO siswa (nomor_daftar, nama_lengkap, jenis_kelamin, asal_sekolah, jurusan_pilihan, nomor_telpon) VALUES (
        '$_POST[nomor_daftar]',
        '$_POST[nama_lengkap]',
        '$_POST[jenis_kelamin]',
        '$_POST[asal_sekolah]',
        '$_POST[jurusan_pilihan]',
        '$_POST[nomor_telpon]'
        )");

        header("location: data_siswa.php");
    }