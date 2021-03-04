<?php
    function compare(int $age_input, int $age_correct, int $scope_min, int $scope_max):int{
        if($age_input !== $age_correct){
            if(($scope_min <= $age_correct) && ($age_correct <= $age_input)){
                $scope_max = $age_input;
                print("LOWER") . PHP_EOL;
            }elseif(($age_input <= $age_correct) && ($age_correct <= $scope_max)){
                $scope_min = $age_input;
                print("UPPER") . PHP_EOL;
            }
            print("Age? >>");
            $age_input = trim(fgets(STDIN));
            return compare($age_input, $age_correct, $scope_min, $scope_max);
        }
        return $age_correct;
    }

    $MIN_AGE = 20;
    $MAX_AGE = 36;

    $age_correct = random_int($MIN_AGE, $MAX_AGE);
    $scope_min = $MIN_AGE;
    $scope_max = $MAX_AGE;

    print("Age? >>");
    $age_input = trim(fgets(STDIN));
    $answer = compare($age_input, $age_correct, $scope_min, $scope_max);
    print("BINGO! ANSWER >> " . $answer . "\n");