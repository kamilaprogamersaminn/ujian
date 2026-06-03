<?php
    include '../connect.php';
    $id= $_GET['id'];

    mysqli_query($conn, "DELETE FROM nama WHERE id='$id'");

    header("location: nama.php");

?>