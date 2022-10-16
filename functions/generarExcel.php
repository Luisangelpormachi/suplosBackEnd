<?php

include("../db/connection.php");

if (isset($_GET['generar_excel'])) {

    $ciudad = $_GET["ciudad"];
    $tipo = $_GET["tipo"];

    $sql = "SELECT * FROM bienes WHERE id != ''";

    if (!empty($ciudad)) {
        $sql .= " AND ciudad = '$ciudad'";
    }

    if (!empty($tipo)) {
        $sql .= " AND tipo = '$tipo'";
    }

    $query = mysqli_query($connect, $sql);

    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=datos-usuarios.xls");

    if (!$query) {
        die("Ocurrio un error");
    }

    $template = "";

    while ($row = mysqli_fetch_array($query)) {

        $direccion = $row['direccion'];
        $ciudad = $row['ciudad'];
        $telefono = $row['telefono'];
        $codigo_postal = $row['codigo_postal'];
        $tipo = $row['tipo'];
        $precio = $row['precio'];

        if (isset($ciudad) && isset($tipo)) {
            $template .= "<tr>
            <td>$direccion</td>
            <td>$ciudad</td>
            <td>$telefono</td>
            <td>$codigo_postal</td>
            <td>$tipo</td>
            <td>$precio</td>
            </tr>";
        }
    }
}

?>

<table border="1">
    <caption>Reporte de Bienes</caption>
    <tr>
        <th>Direccion</th>
        <th>Ciudad</th>
        <th>Telefono</th>
        <th>Codigo</th>
        <th>Tipo</th>
        <th>Precio</th>
    </tr>

    <?= $template ?>

</table>