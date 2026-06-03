<?php 
    include 'connect.php';
    session_start();

    $error = "";

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
        $user  = mysqli_fetch_assoc($query);

        if ($user) {

            if ($password == $user['password']) {

                $_SESSION['user'] = $user['nama'];
                $_SESSION['id']   = $user['id'];

                header("Location: ../data_siswa/data_siswa.php");
                exit;

            } else {
                $error = "Password salah!";
            }

        } else {
            $error = "Email tidak ditemukan!";
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>
<body>

    <div class="container">

        <h1 class="title">
            &lt;/ LOGIN &gt;
        </h1>

        <p class="subtitle">
            Silakan masuk ke penyimpanan Data
        </p>

        <?php if ($error): ?>
            <div class="error-msg">
                <?= $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST">

            <div class="input-group">
                <label>Email</label>

                <input 
                    type="email"
                    name="email"
                    placeholder="example@mail.com"
                    required
                >
            </div>

            <div class="input-group">
                <label>Password</label>

                <input 
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required
                >
            </div>

            <button type="submit">
                LOGIN 
            </button>

        </form>

       
    </div>

</body>
</html>