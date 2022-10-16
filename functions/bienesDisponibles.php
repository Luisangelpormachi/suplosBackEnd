<?php

//obtener archivo json
$dataJson = file_get_contents("./data-1.json");
$bienesDisponibles = json_decode($dataJson, true);

//variable para renderizar data a la vista
$template1 = "";
$ciudades = array();
$tipos = array();
$count = 0;
$resultados = false;

foreach ($bienesDisponibles as $key => $item) {

    $id = $item['Id'];
    $direccion = $item['Direccion'];
    $ciudad = $item['Ciudad'];
    $telefono = $item['Telefono'];
    $codigo_postal = $item['Codigo_Postal'];
    $tipo = $item['Tipo'];
    $precio = $item['Precio'];

    //verificar si se selecciono buscar
    if (isset($_POST['buscar'])) {
        $resultados = true;
        $busqueda_ciudad = !empty($_POST['ciudad']) ? $ciudad == $_POST['ciudad'] : true;
        $busqueda_tipo = !empty($_POST['tipo']) ? $tipo == $_POST['tipo'] : true;

        if ($busqueda_ciudad && $busqueda_tipo) {
            $count++;
            $template1 .= "
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
            <form action='./functions/guardarBienes' method='POST' class='form-bienes'>
                <input type='hidden' name='id' value='$id'>
                <button type='submit' class='btn-guardar'>Guardar</button>
            </form>
            <div class='divider'></div>";
        }
    } else {
        $template1 .= "
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
            <form action='./functions/guardarBienes' method='POST' class='form-bienes'>
                <input type='hidden' name='id' value='$id'>
                <button type='submit' class='btn-guardar'>Guardar</button>
            </form>
            <div class='divider'></div>";
    }

    //filtrar ciudades y tipo
    if (!in_array($ciudad, $ciudades, true)) {
        array_push($ciudades, $ciudad);
    }

    if (!in_array($tipo, $tipos, true)) {
        array_push($tipos, $tipo);
    }
}

$filtros = [
    "ciudades" => $ciudades,
    "tipos" => $tipos
];

$filtros = json_encode($filtros, true);
