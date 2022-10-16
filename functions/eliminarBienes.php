<?php

include("../db/connection.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $sql = "DELETE FROM bienes WHERE id = '$id'";
    $query = mysqli_query($connect, $sql);

    if (!$query) {
        die("Ocurrio un error: " . mysqli_error($connect));
    }

    header("Location: ../index.php");
}
