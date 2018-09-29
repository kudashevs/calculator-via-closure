<?php

namespace CalculatorViaClosure;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function foo()
    {
        return true;
    }

    public function testWrongClosureParameterException()
    {
        $this->expectException('\TypeError');
        $calculator = CalculatorGenerator($this->foo());
    }

    public function testWrongFirstNumericParameterTypeException()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($additionFunction);
        $this->expectException('\TypeError');
        $calculate('x', 2);
    }

    public function testWrongSecondNumericParameterTypeException()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($additionFunction);
        $this->expectException('\TypeError');
        $calculate(2, 'y');
    }

    public function testCalculateAddition()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($additionFunction);
        $this->assertEquals(4, $calculate(2, 2));
    }

    public function testCalculateSubstraction()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($substractionFunction);
        $this->assertEquals(0, $calculate(2, 2));
    }

    public function testCalculateMultiplication()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($multiplicationFunction);
        $this->assertEquals(4, $calculate(2, 2));
    }

    public function testCalculateDivision()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($divisionFunction);
        $this->assertEquals(1, $calculate(2, 2));
    }

    public function testCalculateZeroEception()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($divisionFunction);
        $this->expectException('DivisionByZeroError');
        $calculate(2, 0);
    }

}