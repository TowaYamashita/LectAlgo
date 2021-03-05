<?php
    // 第N項のフィボナッチ数を再起関数で求める

    function fibo(int $num):int{
        if($num === 0){
            return 0;
        }elseif($num === 1){
            return 1;
        }
        return fibo($num - 1) + fibo($num - 2);
    }

    print("NUMBER? >>");
    $number = (int)trim(fgets(STDIN));
    print(fibo($number)) . PHP_EOL;