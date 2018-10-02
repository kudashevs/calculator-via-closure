<?php

use PHPUnit\Framework\TestCase;
use function CalculatorViaClosure\CalculatorGenerator;
use CalculatorViaClosure\ClosureException;

class CalculatorTest extends TestCase
{
    public function testWrongGeneratorArgumentType()
    {
        $this->expectException(\TypeError::class);
        CalculatorGenerator('Closure');
    }

    public function testWrongGeneratorClosureRefletionCheck()
    {
        $this->expectException(ClosureException::class);
        CalculatorGenerator(function ($x) { return $x; });
    }

    public function testWrongClosureReflectionCheckException()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($addition);
        $this->expectException('\ArgumentCountError');
        $calculate(2, 2, 2);
    }

    public function testWrongFirstNumericParameterTypeException()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($addition);
        $this->expectException('\TypeError');
        $calculate('x', 2);
    }

    public function testWrongSecondNumericParameterTypeException()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($addition);
        $this->expectException('\TypeError');
        $calculate(2, 'y');
    }

    public function testCalculateAddition()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($addition);
        $this->assertEquals(4, $calculate(2, 2));
        $this->assertEquals(7, $calculate(5, 2));
    }

    public function testCalculateSubstraction()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($substraction);
        $this->assertEquals(0, $calculate(2, 2));
        $this->assertEquals(3, $calculate(5, 2));
    }

    public function testCalculateMultiplication()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($multiplication);
        $this->assertEquals(4, $calculate(2, 2));
        $this->assertEquals(10, $calculate(5, 2));
    }

    public function testCalculateDivision()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($division);
        $this->assertEquals(1, $calculate(2, 2));
        $this->assertEquals(2.5, $calculate(5, 2));
    }

    public function testCalculateDivisionZeroException()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($division);
        $this->expectException('\DivisionByZeroError');
        $calculate(2, 0);
    }

    public function testCalculateModulus()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($modulus);
        $this->assertEquals(0, $calculate(2, 2));
        $this->assertEquals(1, $calculate(5, 2));
    }

    public function testCalculateModulusZeroException()
    {
        require __DIR__ . '/../src/CalculatorOperators.php';
        $calculate = CalculatorGenerator($modulus);
        $this->expectException('\DivisionByZeroError');
        $calculate(2, 0);
    }
}