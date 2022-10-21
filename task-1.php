<?php
function compareNumbersWithTernary(int $value): string
{
    return $value > 30
        ? $value. ":". " more than 30"
        : ($value > 20
            ? $value. ":". " more than 20"
            : ($value > 10
                ? $value. ":". " more than 10"
                : $value. ":". " Equal or less than 10"));
}

function compareNumbersWithIf(int $value): string
{
    if($value > 30){
        return $value. ":". " more than 30";
    }
    elseif($value > 20){
        return $value. ":". " more than 20";
    }
    elseif($value > 10){
        return $value. ":". " more than 10";
    }
    else{
        return $value. ":". " Equal or less than 10";
    }

}

function compareNumbersWithSwitch(int $value): string
{
    switch($value)
    {
        case $value > 30:
            return $value. ":". " more than 30";
        case $value > 20:
            return $value. ":". " more than 20";
        case $value > 10:
            return $value. ":". " more than 10";
        default:
            return $value. ":". " Equal or less than 10";
    }

}

echo compareNumbersWithTernary(31) . "\n";

echo compareNumbersWithIf(11) . "\n";

echo compareNumbersWithSwitch(5) . "\n";
