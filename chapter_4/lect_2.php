<?php
    // 最大公約数をユークリッドの互除法を用いた再起関数で求める

    function GCD(int $num_a, int $num_b):int{
        return $num_b === 0 ? $num_a : GCD($num_b, $num_a % $num_b);
    }

    print("NUMBER_A? >>");
    $number_a = (int)trim(fgets(STDIN));
    print("NUMBER_B? >>");
    $number_b = (int)trim(fgets(STDIN));
    print(GCD($number_a, $number_b)) . PHP_EOL;