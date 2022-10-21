<?php

class MinQueue implements \Countable
{
    private $queue;

    private $register;

    public function __construct()
    {
        $this->queue = new class extends \SplPriorityQueue
        {
            #[ReturnTypeWillChange] public function compare($p, $q)
            {
                return $q <=> $p;
            }
        };

        $this->register = new \SplObjectStorage();
    }

    public function insert($value, $priority)
    {
        $this->queue->insert($value, $priority);
        $this->register->attach($value);
    }

    public function extract()
    {
        $value = $this->queue->extract();
        $this->register->detach($value);

        return $value;
    }

    public function contains($value)
    {
        return $this->register->contains($value);
    }

    #[ReturnTypeWillChange] public function count()
    {
        return count($this->queue);
    }
}
