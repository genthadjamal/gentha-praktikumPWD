<?php
    include "koneksi.php";
    $sql="delete from users where id_users= '$_GET[id]'";
    mysqli_query($con, $sql);
    mysqli_close($con);
    header('location:tampil_user.php');
?>