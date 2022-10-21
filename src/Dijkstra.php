<?php

class Dijkstra
{
    private $neighbors;

    private $length;

    public function __construct(callable $neighbors, callable $length)
    {
        $this->neighbors = $neighbors;
        $this->length = $length;
    }

    public function findPath($src, $dst): array
    {
        $queue = new MinQueue();
        $distance = new \SplObjectStorage();
        $path = new \SplObjectStorage();

        $queue->insert($src, 0);
        $distance[$src] = 0;

        while (count($queue) > 0) {
            $u = $queue->extract();

            if ($u === $dst) {
                return $this->buildPath($dst, $path);
            }

            foreach (call_user_func($this->neighbors, $u) as $v) {
                $alt = $distance[$u] + call_user_func($this->length, $u, $v);
                $best = isset($distance[$v]) ? $distance[$v] : INF;

                if ($alt < $best) {
                    $distance[$v] = $alt;
                    $path[$v] = $u;

                    if (!$queue->contains($v)) {
                        $queue->insert($v, $alt);
                    }
                }
            }
        }

        throw new \LogicException('No path found.');
    }

    private function buildPath($dst, \SplObjectStorage $path): array
    {
        $result = [$dst];

        while (isset($path[$dst]) && null !== $path[$dst]) {
            $src = $path[$dst];
            $result[] = $src;
            $dst = $src;
        }

        return array_reverse($result);
    }
}
