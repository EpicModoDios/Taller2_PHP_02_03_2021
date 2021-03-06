

<?php
    // 6.Una compañía de seguros tiene contratados a N vendedores. 
    // Cada uno hace tres ventas a la semana. Su política de pagos 
    // es que un vendedor recibe un sueldo base, y un 10% extra por 
    // comisiones de sus ventas. El gerente de su compañía desea 
    // saber cuánto dinero obtendrá en la semana cada vendedor por 
    // concepto de comisiones por las tres ventas realizadas, y cuanto 
    // tomando en cuenta su sueldo base y sus comisiones. 

    header("Content-Type: application/json");
    $n = (int) 3;
    $ps = (array) [ 50000, 80000, 120000 ];
    $base = (int) 550000;
    $porcentaje = (double) 0.10;
    $lista = (array) [];
    function ventas($id, $ps){
        $venta = (array) [];
        for ($i=0; $i < $id; $i++) { 
            array_push($venta, $ps[rand(0,count($ps)-1)]);
        }
        return $venta;
    }
 
    for ($i=0; $i < $n; $i++) { 
        array_push($lista, (array) [
            "VENTAS" => ventas(rand(1,3), $ps),
            "SUELDO" => $base
        ]);
        $lista[$i]["COMISION"] = array_sum($lista[$i]["VENTAS"])*$porcentaje;
        $lista[$i]["SEMANA"] = $lista[$i]["SUELDO"] + $lista[$i]["COMISION"];
    }
    $lista["COMISIONSEMANA"] = array_column($lista, "COMISION");
    $lista["COMISIONSEMANA"]["TOTALSEMANA"] = array_sum(array_column($lista, "COMISION"));
    $lista["PAGOSEMANA"] = array_column($lista, "SEMANA");
    $lista["PAGOSEMANA"]["TOTALSEMANA"] = array_sum(array_column($lista, "SEMANA"));
    print_r($lista);

?>