<?php
    // Frog問題をDPで解く(緩和処理あり)

    // $pillar_num 柱の本数
    // $pillar_height 各柱の高さ

    function chmin(int &$num_a, int $num_b){
        if($num_a > $num_b){
            $num_a = $num_b;
        }
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

    $HEIGHT_MIN = 1;
    $HEIGHT_MAX = 20;
    $INF = 100100100;

    print("NUMBER? >>");
    $pillar_num    = (int)trim(fgets(STDIN));
    $pillar_height = createNumbersList($HEIGHT_MIN, $HEIGHT_MAX, $pillar_num);
    $dp            = array_fill(0, $pillar_num, $INF);

    $dp[0] = 0;

    for($i=1; $i<$pillar_num; ++$i){
        chmin(
            $dp[$i],
            $dp[$i - 1] + abs($pillar_height[$i] - $pillar_height[$i - 1])
        );
        if($i > 1){
            chmin(
                $dp[$i],
                $dp[$i - 2] + abs($pillar_height[$i] - $pillar_height[$i - 2])
            );
        }
    }

    print_r($pillar_height);
    echo $dp[$pillar_num - 1] . PHP_EOL;
