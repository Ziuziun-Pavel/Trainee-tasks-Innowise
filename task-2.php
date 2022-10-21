<?php

function birthdayCountdownTimer(string $date): string
{
    $day = mb_substr($date, 0, 2);
    $month = mb_substr($date, 3, 2);
    $year = mb_substr($date, 6, 4);

    $birthdayTime = mktime(0,0,0,$month,$day,$year);
    $todayTime = time();
    $diffTime = ($birthdayTime - $todayTime);
    $days = (int) ($diffTime/86400);
    return "Days are left until the entered birthday: $days days!"."\n";
}

echo birthdayCountdownTimer('26-06-2023');