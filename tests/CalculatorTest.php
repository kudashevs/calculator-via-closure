<?php

use PHPUnit\Framework\TestCase;
use function CalculatorViaClosure\Calculator;

class CalculatorTest extends TestCase
{
    public function testCalculatorFunctionThrowExceptionWhenClosureWithEmptyArguments()
    {
        $this->expectException(\InvalidArgumentException::class);

        Calculator(function () {
        });
    }

    public function testCalculatorFunctionThrowExceptionWhenClosureWithWrongArguments()
    {
        require __DIR__ . '/../src/Operations/Addition.php';

        $calculate = Calculator($addition);
        $this->expectException(\InvalidArgumentException::class);

        $calculate('x', 2);
    }

    public function testAdditionClosureReturnExpected()
    {
        require __DIR__ . '/../src/Operations/Addition.php';

        $calculate = Calculator($addition);

        $this->assertEquals(1, $calculate(1));
        $this->assertEquals(4, $calculate(2, 2));
        $this->assertEquals(7, $calculate(5, 2));
        $this->assertEquals(-3, $calculate(-5, 2));
    }

    public function testSubstractionClosureReturnExpected()
    {
        require __DIR__ . '/../src/Operations/Subtraction.php';

        $calculate = Calculator($substraction);

        $this->assertEquals(1, $calculate(1));
        $this->assertEquals(0, $calculate(2, 2));
        $this->assertEquals(3, $calculate(5, 2));
        $this->assertEquals(-3, $calculate(2, 5));
    }

    public function testMultiplicationClosureReturnExpected()
    {
        require __DIR__ . '/../src/Operations/Multiplication.php';

        $calculate = Calculator($multiplication);

        $this->assertEquals(0, $calculate(0));
        $this->assertEquals(1, $calculate(1));
        $this->assertEquals(4, $calculate(2, 2));
        $this->assertEquals(10, $calculate(5, 2));
        $this->assertEquals(-6, $calculate(-3, 2));
    }

    public function testDivisionClosureZeroException()
    {
        require __DIR__ . '/../src/Operations/Division.php';

        $calculate = Calculator($division);

        $this->expectException('\DivisionByZeroError');
        $calculate(2, 0);
    }

    public function testDivisionClosureReturnExpected()
    {
        require __DIR__ . '/../src/Operations/Division.php';

        $calculate = Calculator($division);

        $this->assertEquals(1, $calculate(1));
        $this->assertEquals(1, $calculate(2, 2));
        $this->assertEquals(2.5, $calculate(5, 2));
        $this->assertEquals(-3, $calculate(-6, 2));
    }
}
