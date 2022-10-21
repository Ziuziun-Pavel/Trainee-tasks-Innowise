<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require_once 'src/MinQueue.php';
require_once 'src/Dijkstra.php';
require_once 'src/Maze.php';

foreach (glob('mazes\maze.txt') as $file) {
    $maze = Maze::fromString(file_get_contents($file));

    $start = $maze->find('A');
    $goal = $maze->find('B');

    $helper = new Dijkstra(
        function ($a) use ($maze) {
            return $maze->getNeighbors($a, ['1']);
        },
        function ($a, $b) use ($maze) {
            return $maze->getDistance($a, $b);
        }
    );

    $path = $helper->findPath($start, $goal);

    $mazeStrWithPath = $maze->toString(function ($tile) use ($path) {
        return in_array($tile, $path, true) && !in_array($tile->value, ['A', 'B'])
            ? '.'
            : $tile->value
        ;
    });

    printf("%s\n",  $mazeStrWithPath);
}
