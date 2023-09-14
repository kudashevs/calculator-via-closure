<?php

use PHPUnit\Framework\TestCase;

class MutlitplicationTest extends TestCase
{
    private const MAX_PRECISION = 0.000000001;

    private $multiplication;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->setServiceInstance();

        parent::__construct($name, $data, $dataName);
    }

    /** @test */
    public function it_can_process_one_argument()
    {
        $this->assertSame(2, $this->multiplication->__invoke(2));
    }

    /** @test */
    public function it_can_process_two_arguments()
    {
        $this->assertSame(80, $this->multiplication->__invoke(40, 2));
    }

    /** @test */
    public function it_can_process_multiple_arguments()
    {
        $this->assertSame(464, $this->multiplication->__invoke(58, 4, 2, 1));
    }

    /** @test */
    public function it_can_process_a_zero_number()
    {
        $this->assertSame(0, $this->multiplication->__invoke(42, 0));
    }

    /** @test */
    public function it_can_process_a_negative_number()
    {
        $this->assertSame(-135, $this->multiplication->__invoke(45, -3));
    }

    /**
     * @test
     * @dataProvider provideDifferentValues
     */
    public function it_can_perform_multiplication(array $values, $expected)
    {
        $this->assertEqualsWithDelta($expected, $this->multiplication->__invoke(...$values), self::MAX_PRECISION);
    }

    public function provideDifferentValues(): array
    {
        return [
            'multiply integer and integer' => [
                [12, 2],
                24,
            ],
            'multiply float and float' => [
                [2.5, 1.45],
                3.625,
            ],
            'multiply integer and float' => [
                [5, 12.5],
                62.5,
            ],
            'multiply float and integer' => [
                [12.5, 5],
                62.5,
            ],
        ];
    }

    private function setServiceInstance(): void
    {
        require __DIR__ . '/../../src/Operations/multiplication.php';

        if (!is_callable($multiplication)) {
            throw new \RuntimeException('A variable is not a callable. Something went really wrong.');
        }

        $this->multiplication = $multiplication;
    }
}
