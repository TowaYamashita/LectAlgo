<?php
    // 1からNまでの総和を再起関数で求める

    function calc(int $num):int{
        print("calc(" . $num . ")を呼び出した") . PHP_EOL;
        return $num === 0 ? 0 : $num + calc($num - 1);
    }

    print("NUMBER? >>");
    $number = (int)trim(fgets(STDIN));
    print(calc($number)) . PHP_EOL;