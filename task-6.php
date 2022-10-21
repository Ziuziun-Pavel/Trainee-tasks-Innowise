<?php

function toCamelCaseStr(string $input): string
{
    $input = preg_replace('/[^a-z0-9' . implode("", []) . ']+/i', ' ', $input);
    $input = trim($input);
    $input = ucwords($input);
    $input = str_replace(" ", "", $input);

    return $input;
}

echo toCamelCaseStr('The quick-brown_fox jumps over the_lazy-dog');