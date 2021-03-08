<?php
    // 区間分割をDPを用いて考える

    // n 要素の個数

    function chmin(int &$a, int $b){
        if($a > $b){
            $a = $b;
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

    $INF = 100100100;

    print("N ?>>");
    $n = (int)trim(fgets(STDIN));

    $cost = [];
    for($i=0;$i<$n+1;++$i){
        for($j=0;$j<$n+1;++$j){
            $cost[$i][$j] = abs($i-$j)*random_int(1,3);
        }
    }

    $dp = array_fill(0,$n+1,$INF);
    $dp[0] = 0;

    for($i=0;$i<=$n;++$i){
        for($j=0;$j<$i;++$j){
            chmin($dp[$i], $dp[$j] + $cost[$j][$i]);
        }
    }

    echo($dp[$n]) . PHP_EOL;
