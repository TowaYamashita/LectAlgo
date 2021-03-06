<?php
    $MAX_NUMBER_LIMIT = 50;
    $MAX_WEIGHT = 1000;

    // -1 undifine
    //  0 false
    //  1 true
    $memo = [];
    for($i=0; $i<$MAX_NUMBER_LIMIT; $i++){
        for($j=0; $j<$MAX_WEIGHT; $j++){
            $memo[$i][$j] = -1;
        }
    }

    function func(int $num_i, int $num_w, array $num_l):int{
        if($num_i === 0){
            return $num_w === 0 ? 1 : 0;
        }

        global $memo;
        if($memo[$num_i][$num_w] !== -1){
            return $memo[$num_i][$num_w];
        }

        // num_l[$num_i - 1]を選ばない場合
        if(func($num_i - 1, $num_w, $num_l)){
            return $memo[$num_i][$num_w] = 1;
        }
        // num_l[$num_i - 1]を選んだ場合
        if(func($num_i - 1, $num_w - $num_l[$num_i - 1], $num_l)){
            return $memo[$num_i][$num_w] = 1;
        }
        return $memo[$num_i][$num_w] = 0;
    }

    print("WEIGHT? >>");
    $weight = (int)trim(fgets(STDIN));
    $weight = $weight >= $MAX_WEIGHT ? $MAX_WEIGHT - 1 : $weight;
    $number_list = [1,2,3,4,5,6,7,8,9,10];
    $res = func(count($number_list), $weight, $number_list);

    var_dump(boolval($res)) . PHP_EOL;