<?php

    $MAX_LIMIT = 50;
    $memo = array_fill(0, $MAX_LIMIT, -1);

    function tribo(int $num):int{
        if($num === 0){
            return 0;
        }elseif($num === 1 || $num === 2){
            return 1;
        }

        global $memo;
        return $memo[$num] !== -1 ? $memo[$num] : ($memo[$num] = tribo($num - 1) + tribo($num - 2) + tribo($num - 3));
    }

    print("NUMBER? >>");
    $number = (int)trim(fgets(STDIN));
    $number = $number >= $MAX_LIMIT ? $MAX_LIMIT - 1 : $number;
    print(tribo($number)) . PHP_EOL;