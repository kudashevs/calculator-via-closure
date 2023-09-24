<?php

use CalculatorViaClosure\Exceptions\InvalidClosureArgument;
use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
    private const MAX_PRECISION = 0.000000001;

    private $division;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->setServiceInstance();

        parent::__construct($name, $data, $dataName);
    }

    /** @test */
    public function it_can_throw_an_exception_when_division_by_an_integer_zero()
    {
        $this->expectException(InvalidClosureArgument::class);
        $this->expectExceptionMessage('divide by');

        $this->division->__invoke(42, 0);
    }

    /** @test */
    public function it_can_throw_an_exception_when_division_by_a_float_zero()
    {
        $this->expectException(InvalidClosureArgument::class);
        $this->expectExceptionMessage('divide by');

        $this->division->__invoke(42, 0.0);
    }

    /** @test */
    public function it_can_process_one_argument()
    {
        $this->assertSame(2, $this->division->__invoke(2));
    }

    /** @test */
    public function it_can_process_two_arguments()
    {
        $this->assertSame(20, $this->division->__invoke(40, 2));
    }

    /** @test */
    public function it_can_process_multiple_arguments()
    {
        $this->assertSame(7.25, $this->division->__invoke(58, 4, 2, 1));
    }

    /** @test */
    public function it_can_process_a_negative_number()
    {
        $this->assertSame(-15, $this->division->__invoke(45, -3));
    }

    /**
     * @test
     * @dataProvider provideDifferentValues
     */
    public function it_can_perform_division(array $values, $expected)
    {
        $this->assertEqualsWithDelta($expected, $this->division->__invoke(...$values), self::MAX_PRECISION);
    }

    public function provideDifferentValues(): array
    {
        return [
            'divide integer and integer' => [
                [42, 20],
                2.1,
            ],
            'divide float and float' => [
                [3.5, 1.75],
                2.0,
            ],
            'divide integer and float' => [
                [12.5, 5],
                2.5,
            ],
            'divide float and integer' => [
                [5, 12.5],
                0.4,
            ],
        ];
    }

    private function setServiceInstance(): void
    {
        $division = require __DIR__ . '/../../src/Operations/division.php';

        if (!is_callable($division)) {
            throw new \RuntimeException('A variable is not a callable. Something went really wrong.');
        }

        $this->division = $division;
    }
}
