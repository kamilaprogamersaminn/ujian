<?php
    include '../connect.php';
    $id= $_GET['id'];

    $data= mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");
    $item= mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbarui</title>
    <link rel="stylesheet" href="../css/editus.css">
</head>
<body>
        <div class="container">
            <h1>Perbarui</h1>
                <form method="post">
                    username <input type="text" name="username" VALUE="<?= $item['username']; ?>">
                    email <input type="text" name="email" VALUE="<?= $item['email']; ?>">
                    password <input type="password" name="password" VALUE="<?= $item['password']; ?>">

                    <button type="submit" name="update">update</button>
                </form>

                <?php
                    if(isset($_POST['update'])) {
                        mysqli_query($conn, "UPDATE user SET
                        username= '$_POST[username]',
                        email= '$_POST[email]',
                        password= '$_POST[password]'
                        WHERE id='$id'
                    ");

                        header("location: admin.php");
                }
                ?>
        </div>
</body>
</html>