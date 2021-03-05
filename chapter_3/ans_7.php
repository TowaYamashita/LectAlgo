<?php
    // 手も足も出なかったので回答を見ながらやりました。

    /*
     * 回答の指針
     * 長さNの文字列Sの隙間(N-1)箇所に　＋を入れる入れないの選択肢がある。
     * したがって、全ての＋の入れ方の選択肢は 2 ^ (N-1) 個だけ存在する。
     * これらの選択肢を変数bitで管理して、部分和問題として解く。
    */

    $num_problem = "125";

    $length = strlen($num_problem);
    $res = 0;
    for($bit=0; $bit < (1<<($length - 1)); ++$bit){
        $tmp = 0;
        for($i=0; $i<$length-1; ++$i){
            $tmp *= 10;
            $tmp += $num_problem[$i] - '0';

            if($bit & (1<<$i)){
                $res += $tmp;
                $tmp = 0;
            }
        }

        $tmp *= 10;
        $tmp += $num_problem[-1] - '0';
        $res += $tmp;
    }

    print($res) . PHP_EOL;