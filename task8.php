<?php

class Matrix
{
    public function __construct(private readonly int $N,
                                private readonly int $M,
                                private array        $matrix)
    {
    }

    public function sum(array $operand): array
    {
        $result = [];
        if ($this->N !== count($operand) ||
            $this->M !== count($operand[0]))
            throw new Error("Wrong matrix size");
        for ($i = 0; $i < $this->N; $i++) {
            for ($j = 0; $j < $this->M; $j++) {
                $result[$i][$j] = $this->matrix[$i][$j] + $operand[$i][$j];
            }
        }
        return $result;
    }

    public function multiple(array $multiplier): array
    {
        if ($this->M !== count($multiplier))
            throw new Error("Wrong matrix size");
        $result = [];
        $P = count($multiplier[0]);
        for ($i = 0; $i < $this->N; $i++) {
            for ($j = 0; $j < $P; $j++) {
                $sum = 0;
                for ($k = 0; $k < $this->M; $k++) {
                    $sum += $this->matrix[$i][$k] * $multiplier[$k][$j];
                }
                $result[$i][$j] = $sum;
            }
        }
        return $result;
    }

    public function multipleByNumber(float $number): array
    {
        $result = [];
        for ($i = 0; $i < $this->N; $i++) {
            for ($j = 0; $j < $this->M; $j++) {
                $result[$i][$j] = $this->matrix[$i][$j] * $number;
            }
        }
        return $result;
    }

    public function displayMatrix(array $target): void
    {
        $N = count($target);
        $M = count($target[0]);
        for ($i = 0; $i < $N; $i++) {
            for ($j = 0; $j < $M; $j++) {
                echo $target[$i][$j] . " ";
            }
            echo "\n";
        }
        echo "\n";
    }
}

$matrix = new Matrix(2, 3, [[1, 2, 0], [3, 1, -1]]);
$target = $matrix->sum([[4, 3, 5], [2, 4, 6]]);
$matrix->displayMatrix($target);
$target = $matrix->multiple([[1],[2],[3]]);
$matrix->displayMatrix($target);
$target = $matrix->multipleByNumber(2.5);
$matrix->displayMatrix($target);

