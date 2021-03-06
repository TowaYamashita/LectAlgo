<?php
    function tribo(int $num):int{
        if($num === 0){
            return 0;
        }elseif($num === 1 || $num === 2){
            return 1;
        }
        return tribo($num - 1) + tribo($num - 2) + tribo($num - 3);
    }

    print("NUMBER? >>");
    $number = (int)trim(fgets(STDIN));
    print(tribo($number)) . PHP_EOL;