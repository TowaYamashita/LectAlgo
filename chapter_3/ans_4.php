<?php
    function createNumbersList(int $min, int $max, int $amount):array{
        $number_array = [];
        for($i=0; $i<$amount; $i++){
            $num = random_int($min, $max);
            while(in_array($num, $number_array, true)){
                $num = random_int($min, $max);
            }
            $number_array[] = $num;
        }
        return $number_array;
    }

    $MIN_LIMIT = 0;
    $MAX_LIMIT = 100;
    $MAX_NUMBER = 10;

    $number_array = createNumbersList($MIN_LIMIT, $MAX_LIMIT, $MAX_NUMBER);

    $num_min = $MAX_LIMIT + 1;
    $num_max = $MIN_LIMIT - 1;
    for($i=0; $i<count($number_array); $i++){
        if($number_array[$i] < $num_min){
            $num_min        = $number_array[$i];
        }elseif($number_array[$i] > $num_max){
            $num_max = $number_array[$i];
        }
    }

    $diff = $num_max - $num_min;
    print("MAX DIFF:" . $diff) . PHP_EOL;