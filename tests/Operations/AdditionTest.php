<?php

use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    private const MAX_PRECISION = 0.000000001;

    private $addition;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->setServiceInstance();

        parent::__construct($name, $data, $dataName);
    }

    /** @test */
    public function it_can_process_one_argument()
    {
        $this->assertSame(2, $this->addition->__invoke(2));
    }

    /** @test */
    public function it_can_process_two_arguments()
    {
        $this->assertSame(42, $this->addition->__invoke(40, 2));
    }

    /** @test */
    public function it_can_process_multiple_arguments()
    {
        $this->assertSame(64, $this->addition->__invoke(58, 3, 2, 1));
    }

    /** @test */
    public function it_can_process_a_zero_number()
    {
        $this->assertSame(42, $this->addition->__invoke(42, 0));
    }

    /** @test */
    public function it_can_process_a_negative_number()
    {
        $this->assertSame(42, $this->addition->__invoke(45, -3));
    }

    /**
     * @test
     * @dataProvider provideDifferentValues
     */
    public function it_can_perform_addition(array $values, $expected)
    {
        $this->assertEqualsWithDelta($expected, $this->addition->__invoke(...$values), self::MAX_PRECISION);;
    }

    public function provideDifferentValues(): array
    {
        return [
            'add integer to integer' => [
                [12, 20],
                32,
            ],
            'add float to float' => [
                [0.5, 2.45],
                2.95,
            ],
            'add integer to float' => [
                [12.5, 5],
                17.5,
            ],
            'add float to integer' => [
                [5, 12.5],
                17.5,
            ],
        ];
    }

    private function setServiceInstance(): void
    {
        $addition = require __DIR__ . '/../../src/Operations/addition.php';

        if (!is_callable($addition)) {
            throw new \RuntimeException('A variable is not a callable. Something went really wrong.');
        }

        $this->addition = $addition;
    }
}
