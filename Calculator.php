<?php

namespace App;

class Calculator
{
    private float $result = 0;

    public function __construct(
        private readonly float $argumentA, private readonly float $argumentB
    )
    {
    }

    public function __toString(): string
    {
        return $this->result;
    }

    public function add(): Calculator
    {
        $this->result = $this->argumentA + $this->argumentB;
        return $this;
    }

    public function multiply(): Calculator
    {
        $this->result = $this->argumentA * $this->argumentB;
        return $this;
    }

    public function divide(): Calculator
    {
        if ($this->argumentB == 0)
            throw new \Error("Division by zero");
        $this->result = $this->argumentA / $this->argumentB;
        return $this;
    }

    public function subtract(): Calculator
    {
        $this->result = $this->argumentA - $this->argumentB;
        return $this;
    }

    public function addBy(float $argument): Calculator
    {
        $this->result += $argument;
        return $this;
    }

    public function divideBy(float $argument): Calculator
    {
        if ($argument == 0)
            throw new \Error("Division by zero");
        $this->result /= $argument;
        return $this;
    }

    public function multipleBy(float $argument): Calculator
    {
        $this->result *= $argument;
        return $this;
    }

    public function subtractBy(float $argument): Calculator
    {
        $this->result -= $argument;
        return $this;
    }
}

$calc = new Calculator(12, 6);
echo $calc->add() . "\n";
echo $calc->subtract() . "\n";
echo $calc->multiply() . "\n";
echo $calc->divide() . "\n";

echo $calc->add()->divideBy(9)->subtractBy(1)->multipleBy(10) . "\n";