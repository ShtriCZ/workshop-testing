<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use IW\Workshop\DateFormatter;

class DateFormatterTest extends TestCase
{
    public function testNight(): void
    {
        $formatter = new DateFormatter();
        $formatter->setDateTime(new DateTime('2023-01-01 03:00:00'));
        $this->assertSame('Night', $formatter->getPartOfDay());
    }

    public function testMorning(): void
    {
        $formatter = new DateFormatter();
        $formatter->setDateTime(new DateTime('2023-01-01 08:00:00'));
        $this->assertSame('Morning', $formatter->getPartOfDay());
    }

    public function testAfternoon(): void
    {
        $formatter = new DateFormatter();
        $formatter->setDateTime(new DateTime('2023-01-01 14:00:00'));
        $this->assertSame('Afternoon', $formatter->getPartOfDay());
    }

    public function testEvening(): void
    {
        $formatter = new DateFormatter();
        $formatter->setDateTime(new DateTime('2023-01-01 20:00:00'));
        $this->assertSame('Evening', $formatter->getPartOfDay());
    }
}
