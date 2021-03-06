

<?php
    // 1.Ingresar número de término de la siguiente serie: 
    // 200, 198, 196, 194 ,…….,N, mostrar la suma de la serie 
    // completa.

    $p = (int) 200;
    $t = (int) 0;
    $c = (string) "";
    repetir:
    if($p!=0){
        $t += $p;
        $c .= "$p +";
        $p -= 2;
        goto repetir;
    }
    print_r(substr($c, 0, -1)." = ".number_format($t));
?>r