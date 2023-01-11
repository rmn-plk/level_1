<?php
function displayNumbers(int $A, int $B)
{
    $digit = $A < $B ? $A++ : ($A > $B ? $A-- : $B);
    echo $digit;
    if ($digit === $B)
        return;
    displayNumbers($A, $B);
}
displayNumbers(9,4);