<?php

namespace App;

class Node
{
    public function __serialize(): array
    {
        return ["x" => $this->x, "y" => $this->y];
    }

    public function __construct(
        private int $x, private int $y, private int $dist
    )
    {
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @param int $x
     */
    public function setX(int $x): void
    {
        $this->x = $x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @param int $y
     */
    public function setY(int $y): void
    {
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getDist(): int
    {
        return $this->dist;
    }

    /**
     * @param int $dist
     */
    public function setDist(int $dist): void
    {
        $this->dist = $dist;
    }
}