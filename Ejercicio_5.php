

<?php
    // 5.En un centro de verificación de automóviles se desea saber 
    // el promedio de puntos contaminantes de los primeros 25 
    // automóviles que lleguen. Asimismo, se desea saber los puntos 
    // contaminantes del carro que menos contaminó y del que más 
    // contaminó. 
    header("Content-Type: application/json");

    $n = (int) 25;
    $autos = (array) [] ;
    while($n){
        array_push($autos, (array) [
            "MOTOR" => floatval(rand(1,100).".".rand(1,1000)),
            "RADIADOR" => floatval(rand(1,100).".".rand(1,1000)),
            "TUBODEESCAPE" => floatval(rand(1,100).".".rand(1,1000)),
            "AIREACONDICIONADO" => floatval(rand(1,100).".".rand(1,1000)),
        ]);
        $n--;
    }
    $totales = (array) sumasIndividuales($autos);
    function sumasIndividuales($data){
        $totales = (array) [];
        $lista = (array) [];
        $listaPorPunto = (array) [];
        $contaminacionI = (array)[]; 
        $contaminacionM = (array)[]; 
        foreach (array_keys($data[0]) as $key => $value) {
            $lista[$value] = array_column($data, $value);
            $listaPorPunto[$value] = $lista[$value];
            $contaminacionI[$value] = (array) [array_keys($lista[$value], min($lista[$value]))[0] => min($lista[$value])];
            $contaminacionM[$value] = (array) [array_keys($lista[$value], max($lista[$value]))[0] => max($lista[$value])];
            $total = array_sum($lista[$value]);
            $totales[$value] = $total;
        }
        $contaminacionA = array_fill(0, count($data), 0);
        foreach ($listaPorPunto as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $contaminacionA[$key2] += $value2;
            }
        }
        $totales["PROMEDIOCONTAMINACION"] = array_sum($totales)/count($totales);
        $totales["CONTAMINANTEMINIMOPORPUNTO"] = $contaminacionI;
        $totales["CONTAMINANTEMAXIMOPORPUNTO"] = $contaminacionM;
        $totales["CONTAMINANTEMAYOR"] = (array) [
            array_keys($contaminacionA, max($contaminacionA))[0] => max($contaminacionA),
            "CONTAMINANTE" => $data[array_keys($contaminacionA, max($contaminacionA))[0]]
        ];
        $totales["CONTAMINANTEMENOR"] = (array) [
            array_keys($contaminacionA, min($contaminacionA))[0] => min($contaminacionA),
            "CONTAMINANTE" => $data[array_keys($contaminacionA, min($contaminacionA))[0]]
        ];
        return $totales;
    }
    print_r($autos);
    print_r($totales);
    


?>