<?php
    // 部分和問題を再起関数を用いた全探索で求める

    function func(int $num_i, int $num_w, array $num_l):bool{
        if($num_i === 0){
            return $num_w === 0 ? true : false;
        }

        // num_l[$num_i - 1]を選ばない場合
        if(func($num_i - 1, $num_w, $num_l)){
            return true;
        }
        // num_l[$num_i - 1]を選んだ場合
        if(func($num_i - 1, $num_w - $num_l[$num_i - 1], $num_l)){
            return true;
        }
        return false;
    }

    print("WEIGHT? >>");
    $number = (int)trim(fgets(STDIN));
    $number_list = [1,2,3,4,5,6,7,8,9,10];
    var_dump(func(count($number_list), $number, $number_list)) . PHP_EOL;