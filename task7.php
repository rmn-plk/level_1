<?php
function isUrlValid(string $url) : string
{
    $pattern = "#https:\/\/(([\w-]+)(\.[\w])*)+\/#";
    return preg_match($pattern, $url) ? "OK" : "Not a valid URL" ;
}
echo isUrlValid("https://innowise.com/");