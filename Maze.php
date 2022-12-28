<?php

namespace App;
include_once("Node.php");

class Maze
{
    private array $path = [];
    private array $visited = [];
    private const config = "config.txt";
    private readonly array $row;
    private readonly array $col;

    private function clearVisited(): void
    {
        $this->visited = array_fill(0, $this->getFieldRows(),
            array_fill(0, $this->getFieldColumns(), 0));
    }

    public function __construct(
        private array $field
    )
    {
        $this->row = [-1, 0, 0, 1];
        $this->col = [0, -1, 1, 0];
    }

    private function getFieldColumns(): int
    {
        return count($this->field);
    }

    private function getFieldRows(): int
    {
        return count($this->field[0]);
    }

    private function isValid(int $row, int $col): bool
    {
        return ($row >= 0) && ($row < $this->getFieldRows())
            && ($col >= 0) && ($col < $this->getFieldColumns()) &&
            ($this->field[$row][$col] === 0) && (!$this->visited[$row][$col]);
    }

    public function findPath(array $A, array $B): int
    {
        $queue = [];
        $this->clearVisited();
        $this->visited[$A["x"]][$A["y"]] = true;
        $queue[] = new Node($A["x"], $A["y"], 0);
        $minDist = PHP_INT_MAX;
        while ($queue) {
            $node = array_pop($queue);
            $this->path = array_filter($this->path, function (Node $n) use ($node) {
                if ($n->getDist() < $node->getDist())
                    return $n;
            });
            $this->path[] = $node;
            $x = $node->getX();
            $y = $node->getY();
            $dist = $node->getDist();
            if ($x === $B["x"] && $y === $B["y"]) {
                $minDist = $dist;
                break;
            }
            for ($k = 0; $k < 4; $k++) {
                $nextX = $x + $this->row[$k];
                $nextY = $y + $this->col[$k];
                if ($this->isValid($nextX, $nextY)) {
                    $this->visited[$nextX][$nextY] = true;
                    $queue[] = new Node($nextX, $nextY, $dist + 1);
                }
            }
        }
        if ($minDist === PHP_INT_MAX)
        {
            $this->path = [];
            return -1;
        }
        return $minDist;
    }

    public function displayPath(): void
    {
        foreach ($this->path as $node) {
            echo 'x: ' . $node->getX() . " y: " . $node->getY() . "\n";
        }
        echo "\n";
    }

    public function saveConfiguration() : void
    {
        $mazePath = serialize($this->path);
        file_put_contents($this::config, $mazePath);
    }

    public function loadConfiguration() : void
    {
        $mazePath = file_get_contents($this::config);
        $this->path = unserialize($mazePath);
    }

}

$maze = new Maze([
    [0, 0, 0, 0, 1, 0],
    [0, 1, 0, 0, 0, 0],
    [0, 0, 0, 1, 1, 0],
    [1, 1, 0, 0, 1, 0],
    [0, 0, 0, 0, 1, 1],
    [1, 0, 0, 1, 1, 0]]);

echo $maze->findPath(["x" => 0, "y" => 0], ["x" => 4, "y" => 0]) . "\n";
$maze->displayPath();
$maze->saveConfiguration();
echo $maze->findPath(["x" => 0, "y" => 5], ["x" => 4, "y" => 0]) . "\n";
$maze->displayPath();

$maze->loadConfiguration();
$maze->displayPath();