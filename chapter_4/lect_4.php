<?php
    // 第N項のフィボナッチ数を再起関数で求める(メモ化)

    $MAX_LIMIT = 50;
    $memo = array_fill(0, $MAX_LIMIT, -1);

    function fibo(int $num):int{
        if($num === 0){
            return 0;
        }elseif($num === 1){
            return 1;
        }
        global $memo;
        return $memo[$num] !== -1 ? $memo[$num] : ($memo[$num] = fibo($num - 1) + fibo($num - 2));
    }

    print("NUMBER? >>");
    $number = (int)trim(fgets(STDIN));
    $number = $number >= $MAX_LIMIT ? $MAX_LIMIT - 1 : $number;
    print(fibo($number)) . PHP_EOL;