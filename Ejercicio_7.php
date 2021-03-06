

<?php

    // 7.La presión, volumen y temperatura de una masa de aire se 
    // relacionan por la fórmula: 
    // masa= presión * volumen  
    // Calcular el promedio de masa de aire de los neumáticos de N 
    // vehículos que están en reparación en un servicio de alineación 
    // y balanceo. Los vehículos pueden ser motocicletas o automóviles.
    header("Content-Type: application/json");
    $transportes = (array) ["Motocicletas", "Automóviles"];
    $n = (int) 0;
    $lista = (array) [];
    fill:
    if($n<5){
        array_push($lista, (array) [
            "PRESION" => floatval(rand(1,100).".".rand(1,1000)),
            "VOLUMEN" => floatval(rand(1,100).".".rand(1,1000)),
        ]);
        $lista[$n]["MASA"] = round($lista[$n]["PRESION"] * $lista[$n]["VOLUMEN"], 3, PHP_ROUND_HALF_UP);
        $n++;
        goto fill;
    }
    $lista["PROMEDIO"] = round(array_sum(array_column($lista, "MASA"))/count($lista), 3, PHP_ROUND_HALF_UP);
    print_r($lista);
?>