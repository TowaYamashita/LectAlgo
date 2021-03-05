<?php
    function howManyCal(int $num):int{
        $count = 0;
        while($num % 2 === 0){
            $num = $num / 2;
            $count++;
        }
        return $count;
    }

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
    $MAX_LIMIT = 100000;
    $MAX_NUMBER = 10;

    $number_array = createNumbersList($MIN_LIMIT, $MAX_LIMIT, $MAX_NUMBER);
    $cal_min = 0;
    for($i=0; $i<count($number_array); $i++){
        if($number_array[$i] % 2 !== 0){
            $cal_min = 0;
            break;
        }else{
            $cal_min = ($cal_min > howManyCal($number_array[$i])) ? howManyCal($number_array[$i]) : $cal_min;
        }
    }
    print($cal_min) . PHP_EOL;