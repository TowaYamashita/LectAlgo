<?php
    print("K? >>");
    $number_k = (int)trim(fgets(STDIN));
    print("N? >>");
    $number_n = (int)trim(fgets(STDIN));

    // 0 <= x,y,z <= K
    // x + y + z = N

    // z = N - y -x
    // 0 <= z <= K
    $count = 0;
    for($x=0; $x<=min($number_k, $number_n); ++$x){
        for($y=0; $y<=min($number_k, $number_n); ++$y){
            $z = $number_n - $y -$x;
            if($z >= 0 && $z <= $number_k){
                $count++;
            }
        }
    }

    print($count) . PHP_EOL;