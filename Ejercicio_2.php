

<?php

    // 2.Hacer un programa que, dado el valor de n, calcule la suma
    // de la serie: (1/1) + (1/2) + (1/3) +...+ (1/n)

    $n = (int) 3;
    $t = (double) 0;
    $c = (string) "";
    for ($i=1; $i <= $n ; $i++) { 
        $t += (1/$i);
        $c .= "(1 / $i) +";
    }
    echo(substr($c, 0, -1)." = ".number_format($t, 5, ',', '.'));
?>