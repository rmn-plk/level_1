<?php
function capitalizeWords(string $input): string
{
    $input = trim($input);
    $input = str_replace('-', ' ', $input);
    $input = str_replace('_', ' ', $input);
    $result = explode(' ', $input);
    $result = array_map(fn(string $str) => ucfirst($str), $result);
    return implode('', $result);
}

$str = '     The quick-brown_fox jumps over the_lazy-dog  ';

echo capitalizeWords($str);