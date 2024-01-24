<?php
    /** @var mysqli $db */
    require_once "include/connection.php";

    $id= $_GET['id'];

    $delete= "DELETE FROM reseveringen WHERE id = '$id'";
    mysqli_query($db,$delete);

    header("Location: reserveringen.php");
?>