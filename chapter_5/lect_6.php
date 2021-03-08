<?php
    // 編集距離をDPを用いて求める

    // s 変更前の文字列
    // t 変更後の文字列

    function chmin(string &$a, string $b){
        if($a > $b){
            $a = $b;
        }
    }

    $INF = 100100100;

    print("TEXT S? >>");
    $text_s = (string)trim(fgets(STDIN));
    print("TEXT T? >>");
    $text_t = (string)trim(fgets(STDIN));

    $dp = [];
    for($i=0;$i<mb_strlen($text_s)+1;$i++){
        for($j=0;$j<mb_strlen($text_t)+1;$j++){
            $dp[$i][$j] = $INF;
        }
    }

    $dp[0][0] = 0;
    for($i=0;$i<=mb_strlen($text_s);++$i){
        for($j=0;$j<=mb_strlen($text_t);++$j){
            // 変更操作
            if($i>0 && $j>0){
                if($text_s[$i-1] === $text_t[$j-1]){
                    chmin($dp[$i][$j], $dp[$i-1][$j-1]);
                }else{
                    chmin($dp[$i][$j], $dp[$i-1][$j-1]+1);
                }
            }
            // 削除操作
            if($i>0){
                chmin($dp[$i][$j], $dp[$i-1][$j]+1);
            }
            // 挿入操作
            if($j>0){
                chmin($dp[$i][$j], $dp[$i][$j-1]+1);
            }
        }
    }

    echo($dp[mb_strlen($text_s)][mb_strlen($text_t)]) . PHP_EOL;
