<?php
const GREATER_THAN_30 = "More than 30";
const GREATER_THAN_20 = "More than 20";
const GREATER_THAN_10 = "More than 10";
const EQUAL_OR_LESS_THAN_10 = "Equal or less than 10";
function isGreater1(int $inputNumber): string
{
    if ($inputNumber > 30)
        return GREATER_THAN_30;
    elseif ($inputNumber > 20)
        return GREATER_THAN_20;
    elseif ($inputNumber > 10)
        return  GREATER_THAN_10;
    else
        return EQUAL_OR_LESS_THAN_10;
}

function isGreater2(int $inputNumber) : string
{
    switch ($inputNumber) {
        case ($inputNumber > 30):
            return GREATER_THAN_30;
        case ($inputNumber > 20):
            return GREATER_THAN_20;
        case ($inputNumber > 10):
            return GREATER_THAN_10;
        default: return EQUAL_OR_LESS_THAN_10;
    }
}

function isGreater3(int $inputNumber) : string
{
    return $inputNumber > 30 ? GREATER_THAN_30 :
        ($inputNumber > 20 ? GREATER_THAN_20 :
            ($inputNumber > 10 ? GREATER_THAN_10 : EQUAL_OR_LESS_THAN_10));
}