

<?php
    // 3.Escribir un programa que: Pida por teclado una fecha en 
    // tres variables: día, mes y año (datos enteros). Muestre por 
    // pantalla:

    // •"FECHA CORRECTA", en el caso de que la fecha sea válida.
    // •"FECHA INCORRECTA", en el caso de que la fecha no sea válida. 
    
    header("Content-Type: application/json");

    function cmp($a, $b){
        $a = preg_replace('@^(un|una|la) @', '', $a);
        $b = preg_replace('@^(un|una|la) @', '', $b);
        return strcasecmp($a, $b);
    }
    uksort($calendario, "cmp"); uksort($teclado, "cmp");
    $calendario = (array) [
        "ANOS" => 1000,
        "MES" => (array) [
            "Enero", "Febrero", "Marzo", "Abril", "Mayo", 
            "Junio", "Julio", "Agosto", "Septiembre", "Octubre", 
            "Noviembre", "Diciembre"
        ],
        "DIAS" => array_fill(1,31, "")
    ];
    $teclado = (array) ["DIAS" => 31, "MES" => 3, "ANOS" => 2021];
    foreach ($calendario as $key => $value) {
        if($key=="ANOS"){
            if($teclado[$key]>=$value){
                print_r("El año es valido: $teclado[$key]<br>");
            }else{
                print_r("El año es invalido <br>");
            }
        }else if($key=="DIAS"){
            if(isset($value[$teclado[$key]])){
                print_r("El dia es valido: $teclado[$key]<br>");
            }else{
                print_r("El dia es invalido<br>");
            }
        }else if($key=="MES"){
            if(isset($value[$teclado[$key]-1])){
                print_r("El Mes es: {$value[$teclado[$key]-1]} <br>");
            }else{
                print_r("El Mes invalido<br>");
            }
        }
    }

?>