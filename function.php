<?php
use UI\Draw\Color;

//https://snipp.ru/php/hex-to-rgb
function rgbToHex($red, $green, $blue)
{
    $result = '#';
    foreach (array($red, $green, $blue) as $row) {
        $result .= str_pad(dechex($row), 2, '0', STR_PAD_LEFT);
    }

    return $result;
}

function inverseColor($red, $green, $blue)
{
    $result = '#';
    foreach (array($red, $green, $blue) as $row) {
        $result .= str_pad(dechex(255 - $row), 2, '0', STR_PAD_LEFT);
    }

    return $result;
}

?>