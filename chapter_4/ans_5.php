<?php
    // 手も足も出なかったので回答を見ながらやりました。

    /*
     * 回答の指針
     *
     * 各桁が7,5,3のいずれかから構成されるN以下の整数を再起関数で作成する
     * そのようにして作成した整数が7,5,3それぞれ1回以上使っていれば、753数としてカウントする
    */

    // K以下の753数が何個あるかを求める
    // e.g. K = 1000 => 6個 (357, 375, 537, 573, 735, 753)
    // e.g. K = 3600 => 12個 (357, 375, 537, 573, 735, 753, 3357, 3375, 3537, 3557, 3573, 3577)

    $count = 0;

    function cnt(int $num_input, int $num_current, int $already_use):void{
        global $count;
        // base
        if($num_current > $num_input){
            return;
        }
        if($already_use === 0b111){
            $count += 1;
        }
        cnt($num_input, $num_current * 10 + 7, $already_use | 0b001);
        cnt($num_input, $num_current * 10 + 5, $already_use | 0b010);
        cnt($num_input, $num_current * 10 + 3, $already_use | 0b100);
    }

    print("NUMBER? >>");
    $num_input = (int)trim(fgets(STDIN));

    $num_current = 0;
    $already_use = 0b000;

    cnt($num_input, $num_current, $already_use);
    print($count) . PHP_EOL;