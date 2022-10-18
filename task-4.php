<?php

function deleteElement(array $array, int $position): array
{
     array_splice($array, $position, 1);
     return $array;
}

print json_encode(deleteElement( [1,2,3,4,5,6], 3));