<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use IW\Workshop\Calculator;
use InvalidArgumentException;

final class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testAddReturnsCorrectSum(): void
    {
        $this->assertSame(5.0, $this->calculator->add(2.0, 3.0));
        $this->assertSame(-1.0, $this->calculator->add(2.0, -3.0));
        $this->assertSame(0.0, $this->calculator->add(0.0, 0.0));
    }

    public function testDivideReturnsCorrectQuotient(): void
    {
        $this->assertSame(2.0, $this->calculator->divide(10.0, 5.0));
        $this->assertSame(-2.5, $this->calculator->divide(-5.0, 2.0));
    }

    public function testDivideByZeroThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Division by zero');
        $this->calculator->divide(10.0, 0.0);
    }
}
