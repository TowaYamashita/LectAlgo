<?php
    // ナップサック問題をDPで解く(緩和処理あり)

    // $item_num 品物の数
    // $item_weight 品物の重量
    // $item_value 品物の価値
    // $weight_limit 品物の重量制限

    function chmax(int &$num_a, int $num_b){
        if($num_a < $num_b){
            $num_a = $num_b;
        }
    }

    $VALUE_MIN  = 1;
    $VALUE_MAX  = 20;
    $WEIGHT_MIN = 1;
    $WEIGHT_MAX = 10;

    print("ITEM COUNT? >>");
    $item_num = (int)trim(fgets(STDIN));
    print("WEIGHT LIMIT? >>");
    $weight_limit = (int)trim(fgets(STDIN));

    $items_weight = [];
    $items_value = [];
    for($i=0;$i<$item_num;++$i){
        $items_weight[$i] = random_int($WEIGHT_MIN, $WEIGHT_MAX);
        $items_value[$i]  = random_int($VALUE_MIN, $VALUE_MAX);
    }

    $dp = [];
    for($i=0;$i<$item_num+1;$i++){
        for($w=0;$w<$weight_limit+1;$w++){
            $dp[$i][$w] = 0;
        }
    }

    for($i=0;$i<$item_num;++$i){
        for($w=0;$w<=$weight_limit;++$w){
            // i番目の品物を選ぶ場合
            if($w - $items_weight[$i] >= 0){
                chmax(
                    $dp[$i+1][$w],
                    $dp[$i][$w - $items_weight[$i]] + $items_value[$i]
                );
            }
            // i番目の品物を選ばない場合
            chmax(
                $dp[$i+1][$w],
                $dp[$i][$w]
            );
        }
    }

    echo($dp[$item_num][$weight_limit]) . PHP_EOL;