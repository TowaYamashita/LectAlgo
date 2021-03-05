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

    print("Search? >>");
    $number_search = (int)trim(fgets(STDIN));

    $count = 0;
    for($i=0; $i<count($number_array); $i++){
        if($number_array[$i] === $number_search){
            $count++;
        }
    }

    $count === 0 ? print("Not Exist\n") : print($count) . PHP_EOL;