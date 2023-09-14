<?php

use CalculatorViaClosure\Exceptions\InvalidCallable;
use PHPUnit\Framework\TestCase;
use function CalculatorViaClosure\Calculator;

class CalculatorTest extends TestCase
{
    /** @test */
    public function it_can_throw_an_exception_when_a_closure_with_no_arguments()
    {
        $this->expectException(InvalidCallable::class);
        $this->expectExceptionMessage('argument');

        calculator(function () {
        });
    }

    /** @test */
    public function it_can_throw_an_exception_when_a_closure_with_wrong_arguments()
    {
        $calculate = calculator($GLOBALS['addition']);
        $this->expectException(\InvalidArgumentException::class);

        $calculate('wrong', 2);
    }

    /** @test */
    public function it_can_perform_addition()
    {
        $calculate = calculator($GLOBALS['addition']);

        $this->assertEquals(1, $calculate(1));
        $this->assertEquals(4, $calculate(2, 2));
        $this->assertEquals(7, $calculate(5, 2));
        $this->assertEquals(-3, $calculate(-5, 2));
    }

    /** @test */
    public function it_can_perform_substraction()
    {
        $calculate = calculator($GLOBALS['subtraction']);

        $this->assertEquals(1, $calculate(1));
        $this->assertEquals(0, $calculate(2, 2));
        $this->assertEquals(3, $calculate(5, 2));
        $this->assertEquals(-3, $calculate(2, 5));
    }

    /** @test */
    public function it_can_perform_multiplication()
    {
        $calculate = calculator($GLOBALS['multiplication']);

        $this->assertEquals(0, $calculate(0));
        $this->assertEquals(1, $calculate(1));
        $this->assertEquals(4, $calculate(2, 2));
        $this->assertEquals(10, $calculate(5, 2));
        $this->assertEquals(-6, $calculate(-3, 2));
    }

    /** @test */
    public function it_can_throw_an_exception_when_division_by_zero()
    {
        $calculate = calculator($GLOBALS['division']);

        $this->expectException('\DivisionByZeroError');
        $calculate(2, 0);
    }

    /** @test */
    public function it_can_perform_division()
    {
        $calculate = calculator($GLOBALS['division']);

        $this->assertEquals(1, $calculate(1));
        $this->assertEquals(1, $calculate(2, 2));
        $this->assertEquals(2.5, $calculate(5, 2));
        $this->assertEquals(-3, $calculate(-6, 2));
    }
}
