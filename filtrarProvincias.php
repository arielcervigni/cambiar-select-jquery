<?php
// Supongamos que se recibe el valor seleccionado desde el primer select
$valorSeleccionado = $_POST['pais'];

$provinciasJson = file_get_contents("provincias.json");
$provincias = json_decode($provinciasJson, true);

// Lógica para obtener datos según el valor recibido (simulado aquí)
if ($valorSeleccionado == '1') {
    $opcion = "";
    for($i = 0; $i<count($provincias); $i++){
        $aux = $i+1;
        $opcion.= '<option value='.$i+1 .'>' . $provincias[$i]["provincia"] . '</option>';
    }
} 

// Devolver las opciones al cliente
    echo $opcion;
?>