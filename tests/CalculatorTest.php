<?php

use CalculatorViaClosure\Exceptions\InvalidCallable;
use CalculatorViaClosure\Exceptions\InvalidOperationArgument;
use PHPUnit\Framework\TestCase;
use function CalculatorViaClosure\Calculator;

class CalculatorTest extends TestCase
{
    /** @test */
    public function it_can_throw_an_exception_when_an_operation_with_no_arguments()
    {
        $this->expectException(InvalidCallable::class);
        $this->expectExceptionMessage('argument');

        calculator(function () {
        });
    }

    /** @test */
    public function it_can_throw_an_exception_when_no_arguments_are_provided_to_the_closure()
    {
        $this->expectException(InvalidOperationArgument::class);
        $this->expectExceptionMessage('at least');

        $calculate = calculator($GLOBALS['opaddition']);
        $calculate();
    }

    /** @test */
    public function it_can_throw_an_exception_when_an_argument_of_a_wrong_type_is_provided_to_the_closure()
    {
        $this->expectException(InvalidOperationArgument::class);
        $this->expectExceptionMessage('numeric');

        $calculate = calculator($GLOBALS['opaddition']);
        $calculate(42, 'wrong');
    }

    /** @test */
    public function it_can_perform_addition()
    {
        $calculate = calculator($GLOBALS['opaddition']);

        $this->assertEquals(1, $calculate(1));
        $this->assertEquals(4, $calculate(2, 2));
        $this->assertEquals(7, $calculate(5, 2));
        $this->assertEquals(-3, $calculate(-5, 2));
    }

    /** @test */
    public function it_can_perform_substraction()
    {
        $calculate = calculator($GLOBALS['opsubtraction']);

        $this->assertEquals(1, $calculate(1));
        $this->assertEquals(0, $calculate(2, 2));
        $this->assertEquals(3, $calculate(5, 2));
        $this->assertEquals(-3, $calculate(2, 5));
    }

    /** @test */
    public function it_can_perform_multiplication()
    {
        $calculate = calculator($GLOBALS['opmultiplication']);

        $this->assertEquals(0, $calculate(0));
        $this->assertEquals(1, $calculate(1));
        $this->assertEquals(4, $calculate(2, 2));
        $this->assertEquals(10, $calculate(5, 2));
        $this->assertEquals(-6, $calculate(-3, 2));
    }

    /** @test */
    public function it_can_throw_an_exception_when_division_by_zero()
    {
        $this->expectException(InvalidOperationArgument::class);
        $this->expectExceptionMessage('zero');

        $calculate = calculator($GLOBALS['opdivision']);
        $calculate(2, 0);
    }

    /** @test */
    public function it_can_perform_division()
    {
        $calculate = calculator($GLOBALS['opdivision']);

        $this->assertEquals(1, $calculate(1));
        $this->assertEquals(1, $calculate(2, 2));
        $this->assertEquals(2.5, $calculate(5, 2));
        $this->assertEquals(-3, $calculate(-6, 2));
    }
}
