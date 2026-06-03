<?php
    include '../connect.php';
    $id= $_GET['id'];

    $data = mysqli_query($conn, "SELECT * FROM siswa WHERE id='$id'");
    $item = mysqli_fetch_array($data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perubahan</title>
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
                        <input type="text" name="nomor_daftar" value="<?= $item['nomor_daftar']; ?>" placeholder="Masukkan nomor pendaftaran Anda" required>
                    </div>
                    
                    <div class="input-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="<?= $item['nama_lengkap']; ?>" placeholder="Masukkan nama Anda" required>
                    </div>
                    
                    <div class="input-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" required>
                            <option value="">Pilih jenis Kelamin</option>
                            <option value="Perempuan" <?= $item['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                            <option value="Laki-Laki" <?= $item['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
                        </select>
                    </div>
                    
                    <div class="input-group">
                        <label>Asal Sekolah</label>
                        <input type="text" name="asal_sekolah" value="<?= $item['asal_sekolah']; ?>" placeholder="Asal Sekolah Anda" required>
                    </div>
                    
                    <div class="input-group">
                        <label>Jurusan</label>
                        <select name="jurusan_pilihan" required>
                            <option value="">Pilih jurusan</option>
                            <option value="Rekayasa Perangkat Lunak" <?= $item['jurusan_pilihan'] == 'Rekayasa Perangkat Lunak' ? 'selected' : ''; ?>>Rekayasa Perangkat Lunak</option>
                            <option value="Tata Busana" <?= $item['jurusan_pilihan'] == 'Tata Busana' ? 'selected' : ''; ?>>Tata Busana</option>
                            <option value="Teknik Sepeda Motor" <?= $item['jurusan_pilihan'] == 'Teknik Sepeda Motor' ? 'selected' : ''; ?>>Teknik Sepeda Motor</option>
                        </select>
                    </div>
                    
                    <div class="input-group">
                        <label>Nomor Telepon</label>
                        <input type="text" name="nomor_telpon" value="<?= $item['nomor_telpon']; ?>" placeholder="Nomor Telepon Anda" required>
                    </div>

                    <button type="submit" name="update" class="btn-kirim">UPDATE PENDAFTARAN</button>
                </form>
        </div>

</body>
</html>

<?php
if(isset($_POST['update'])){
    mysqli_query($conn, "UPDATE siswa SET
        nomor_daftar='$_POST[nomor_daftar]',
        nama_lengkap='$_POST[nama_lengkap]',
        jenis_kelamin='$_POST[jenis_kelamin]',
        asal_sekolah='$_POST[asal_sekolah]',
        jurusan_pilihan='$_POST[jurusan_pilihan]',
        nomor_telpon='$_POST[nomor_telpon]'
        WHERE id='$id'
    ");

    header("location: data_siswa.php");
}
?>