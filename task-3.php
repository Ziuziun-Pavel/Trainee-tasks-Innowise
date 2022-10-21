<?php
function add_digits(int $value): array
{
    $arr = array();

    while (strlen($value) > 1) {
        $value = array_sum(str_split($value));
        $arr[] = $value;
    }

    return $arr;
}
print json_encode(add_digits(4444 ));
