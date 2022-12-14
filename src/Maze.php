<?php

class Maze
{
    private $tiles = [];

    private function __construct(array $tiles = [])
    {
        $this->tiles = $tiles;
    }

    public static function fromString(string $maze, string $rowDelimiter = "\n"): Maze
    {
        $tiles = [];

        foreach (explode($rowDelimiter, $maze) as $r => $row) {
            $rowTiles = [];
            foreach (str_split(trim($row)) as $c => $value) {
                $rowTiles[] = (object)[
                    'row' => $r,
                    'col' => $c,
                    'value' => $value
                ];
            }

            $tiles[] = $rowTiles;
        }

        return new self($tiles);
    }

    public function toString(callable $renderer = null, string $rowDelimiter = "\n"): string
    {
        $renderer = $renderer ?: function ($tile) { return $tile->value; };

        $result = [];
        foreach ($this->tiles as $r => $row) {
            if (!isset($result[$r])) {
                $result[$r] = [];
            }

            foreach ($row as $c => $tile) {
                $result[$r][$c] = $renderer($tile);
            }
        }

        return implode($rowDelimiter, array_map('implode', $result));
    }

    public function find(string $value)
    {
        foreach ($this->tiles as $row) {
            foreach ($row as $tile) {
                if ($tile->value === $value) {
                    return $tile;
                }
            }
        }

        return null;
    }

    public function getNeighbors($tile, array $filter = []): array
    {
        $neighbors = [];
        foreach ([
            [-1, -1], [-1, 0], [-1, 1],
            [ 0, -1],          [ 0, 1],
            [ 1, -1], [ 1, 0], [ 1, 1],
        ] as $transformation) {
            $r = $tile->row + $transformation[0];
            $c = $tile->col + $transformation[1];

            if (isset($this->tiles[$r][$c]) && !in_array($this->tiles[$r][$c]->value, $filter, true)) {
                $neighbors[] = $this->tiles[$r][$c];
            }
        }

        return $neighbors;
    }

    public function getDistance($a, $b): float
    {
        $p = $b->row - $a->row;
        $q = $b->col - $a->col;

        return sqrt($p * $p + $q * $q);
    }
}
