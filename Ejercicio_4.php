

<?php

    // 4.Escribir un programa en php que permita 
    // ingresar para los N alumnos de una universidad: 
    // SEXO (‘M’ o ‘F’), edad  y carrera (‘A’,’B’,’C’). 
    // Imprimir la carrera con menor promedio de edad de 
    // sus alumnos que son varones

    header("Content-Type: application/json");

    $sexo = (array) ["F","M"];
    $carrera = (array) ["A","B","C"];
    $carrerasM = (array) [];
    $carrerasF = (array) [];
    $n = (int) 20;
    $alumnos = (array) [];
    do{
        array_push($alumnos, (array) [
            "SEXO" => $sexo[rand(0,1)],
            "EDAD" => rand(18,50),
            "CARRERA" => $carrera[rand(0,2)]
        ]);
        $n--;
    }while($n);
    function promedioEdadCarrera($lista){
        $total = (int) 0; 
        $i = (int) 0;
        $edades = (array) [];
        $persona = (string) "";
        $carreraMayor = (int) max(array_count_values(array_column($lista, 'CARRERA')));
        $carreraNombre = array_count_values(array_column($lista, 'CARRERA'));
        $carreraKey = (string) array_keys($carreraNombre,$carreraMayor)[0];
        foreach ($lista as $key => $value) {
            if($value["CARRERA"]==$carreraKey){
                $total += $value["EDAD"];
                $i++;
                $persona = $value["SEXO"];
                array_push($edades, $value["EDAD"]);
            }
        }
        return (array) ["LISTAEDADES" => $edades, "PROMEDIO" => number_format($total/$i, 2,",", "."), "CARRERAMASSOLICITADA" => $carreraKey, "TOTALALUMNOS" => $i, "SEXO" => $persona];
    }
    foreach ($alumnos as $key => $value) {
        if($value["SEXO"]==$sexo[1]){
            array_push($carrerasM, $alumnos[$key]);
        }else{
            array_push($carrerasF, $alumnos[$key]);
        }
    }
    $carrerasM["INFORME"] = promedioEdadCarrera($carrerasM);
    $carrerasF["INFORME"] = promedioEdadCarrera($carrerasF);
    print_r($carrerasM);
    print_r($carrerasF);
?>