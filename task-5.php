<?php

function digitsBetween(int $a, int $b): string
{
    if ($a > $b) {
        if ($a == $b) {
            return $a;
        }
        return $a . "," . digitsBetween($a - 1, $b) ;
    } else {
        if ($a == $b) {
            return $a;
        }
        return $a . "," . digitsBetween($a + 1, $b);
    }
}

print json_encode(digitsBetween(9,4));