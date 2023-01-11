<?php
//Didn't get it this task, array_values forbidden, but array_splice not, what's the point?
function removeElement(array $arr, int $position): array
{
    array_splice($arr, $position, 1);
    return $arr;
}

$a = [0 => 1, 1 => 2, 2 => 3, 3 => 4, 4 => 5];
var_dump(removeElement($a, 0));

function removeElement2(array $arr, int $position) : array
{
    unset($arr[$position]);
    $tmp = [];
    foreach ($arr as $item){
        $tmp[] = $item;
    }
    return $tmp;
}
$b = [0 => 1, 1 => 2, 2 => 3, 3 => 4, 4 => 5];
var_dump(removeElement2($b, 0));