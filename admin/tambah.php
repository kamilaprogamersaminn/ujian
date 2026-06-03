<?php
    include '../connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
    <link rel="stylesheet" href="../css/editus.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Data</h1>
        
        <form method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username baru" required>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="contoh@domain.com" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit" name="simpan">Simpan Data</button>
        </form>
    </div>

    <?php
    if(isset($_POST['simpan'])){
        mysqli_query($conn, "INSERT INTO user (username, email, password) VALUES (
            '$_POST[username]',
            '$_POST[email]',
            '$_POST[password]'
        )");

        header("location: admin.php");
    }
    ?>
</body>
</html>