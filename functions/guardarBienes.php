<?php

include("../db/connection.php");

if (isset($_POST['id'])) {

    $id_selected = $_POST['id'];

    //obtener archivo json
    $dataJson = file_get_contents("../data-1.json");
    $bienesDisponibles = json_decode($dataJson, true);

    foreach ($bienesDisponibles as $key => $item) {
        $id = $item['Id'];

        if ($id_selected == $id) {

            $direccion = $item['Direccion'];
            $ciudad = $item['Ciudad'];
            $telefono = $item['Telefono'];
            $codigo_postal = $item['Codigo_Postal'];
            $tipo = $item['Tipo'];
            $precio = $item['Precio'];

            $sql = "INSERT INTO bienes(direccion, ciudad, telefono, codigo_postal, tipo, precio) VALUES ('$direccion', '$ciudad', '$telefono', '$codigo_postal', '$tipo', '$precio')";
            $query = mysqli_query($connect, $sql);

            if (!$query) {
                die("Ocurrio un error: " . mysqli_error($connect));
            }

            header("Location: ../index.php");
        }
    }
}
