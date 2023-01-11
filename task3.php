<?php
function sumDigits(int $number) : int
{
    $number = abs($number);
    if ($number <= 9) {
        return $number;
    }
    $sum = 0;
    do {
        $digit = $number % 10;
        $number = intval($number / 10);
        $sum += $digit;
    } while ($number > 0);
    return sumDigits($sum);
}

// if needed array of temporary sums
function sumDigits2(int $number) : array
{
    $number = abs($number);
    if ($number <= 9) {
        return $number;
    }
    $result = [];
    $isNotSolved = true;
    while ($isNotSolved){
        $sum = 0;
        do {
            $digit = $number % 10;
            $number = intval($number / 10);
            $sum += $digit;
        } while ($number > 0);
        $result[] = $sum;
        $number = $sum;
        $isNotSolved = $sum > 9;
    };
    return $result;
}

$number = 5689;
echo sumDigits($number) . "\n";
var_dump( sumDigits2($number));

