<?php

use PHPUnit\Framework\TestCase;

class SubtractionTest extends TestCase
{
    private const MAX_PRECISION = 0.000000001;

    private $subtraction;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->setServiceInstance();

        parent::__construct($name, $data, $dataName);
    }

    /** @test */
    public function it_can_process_one_argument()
    {
        $this->assertSame(2, $this->subtraction->__invoke(2));
    }

    /** @test */
    public function it_can_process_two_arguments()
    {
        $this->assertSame(38, $this->subtraction->__invoke(40, 2));
    }

    /** @test */
    public function it_can_process_multiple_arguments()
    {
        $this->assertSame(52, $this->subtraction->__invoke(58, 3, 2, 1));
    }

    /** @test */
    public function it_can_process_a_zero_number()
    {
        $this->assertSame(42, $this->subtraction->__invoke(42, 0));
    }

    /** @test */
    public function it_can_process_a_negative_number()
    {
        $this->assertSame(48, $this->subtraction->__invoke(45, -3));
    }

    /**
     * @test
     * @dataProvider provideDifferentValues
     */
    public function it_can_perform_subtraction(array $values, $expected)
    {
        $this->assertEqualsWithDelta($expected, $this->subtraction->__invoke(...$values), self::MAX_PRECISION);
    }

    public function provideDifferentValues(): array
    {
        return [
            'subtract integer from integer' => [
                [12, 20],
                -8,
            ],
            'subtract float from float' => [
                [2.5, 2.45],
                0.05,
            ],
            'subtract integer from float' => [
                [12.5, 5],
                7.5,
            ],
            'subtract float from integer' => [
                [5, 1.25],
                3.75,
            ],
        ];
    }

    private function setServiceInstance(): void
    {
        $substraction = require __DIR__ . '/../../src/Operations/subtraction.php';

        if (!is_callable($substraction)) {
            throw new \RuntimeException('A variable is not a callable. Something went really wrong.');
        }

        $this->subtraction = $substraction;
    }
}
