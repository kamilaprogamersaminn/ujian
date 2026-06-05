<?php
     include '../connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
   <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

     <div class="container">
            <h1>DATA ADMIN</h1>
            
            <div class="navbar">
                <div class="menu">
                    <b>ADMIN-PANEL</b>
                    <a href="../keluar.php">Kelola Keluar</a>  
                    <a href="../index.php">Beranda Utama</a>  
                    <a href="../admin/admin.php">Kelola Admin</a>
                    <a href="../data_siswa/data_siswa.php">Perekapan Data Siswa</a>
                </div>
            </div>

                <div class="action-buttons"> 
                    <a href="tambah.php" class="btn-tambah">+ Tambah</a>
                </div>
            
            <table>
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>email</th>
                    <th>password</th>
                    <th>memperbarui</th>
                </tr>


                <?php
                    $data = mysqli_query($conn, "SELECT * FROM user");
                    while( $item = mysqli_fetch_array($data)) {
                ?>

                <tr>
                    <td><?= $item['id']; ?></td>
                    <td><?= $item['username']; ?></td>
                    <td><?= $item['email']; ?></td>
                    <td>••••••••</td>
                    <td>
                        <a href="edit.php?id=<?= $item['id']; ?>">Edit</a>
                        <a href="hapus.php?id=<?= $item['id']; ?>"onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                    </td>
                </tr>

                <?php
                        }
                ?>
            </table>
    </div>
</body>
</html>