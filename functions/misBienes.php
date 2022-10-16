<?php

include("./db/connection.php");

$sql = "SELECT * FROM bienes ORDER BY id DESC";
$query = mysqli_query($connect, $sql);

if (!$query) {
    die("Ocurrio un error");
}

$template2 = "";
while ($row = mysqli_fetch_array($query)) {

    $id = $row['id'];
    $direccion = $row['direccion'];
    $ciudad = $row['ciudad'];
    $telefono = $row['telefono'];
    $codigo_postal = $row['codigo_postal'];
    $tipo = $row['tipo'];
    $precio = $row['precio'];

    $template2 .= "
    <div class='box-bienes'>
        <div class='img-bienes'>
            <img src='./img/home.jpg' alt=''>
        </div>
        <div>
            <p><b>Direccion:</b> $direccion </br>
            <b>Ciudad:</b> $ciudad </br>
            <b>Telefono:</b> $telefono </br>
            <b>Codigo postal:</b> $codigo_postal </br>
            <b>Tipo:</b> $tipo </br>
            <b>Precio:</b> $precio </br>
        </div>
    </div>
    <form action='./functions/eliminarBienes' method='POST' class='form-bienes'>
        <input type='hidden' name='id' value='$id'>
        <button type='submit' class='btn-eliminar'>Eliminar</button>
    </form>
    <div class='divider'></div>";
}
