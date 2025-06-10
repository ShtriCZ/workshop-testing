<?php

declare(strict_types=1);

namespace IW\Workshop;

use DateTime;

class DateFormatter
{
    private ?DateTime $dateTime = null;

    public function setDateTime(DateTime $dateTime): void
    {
        $this->dateTime = $dateTime;
    }

    public function getPartOfDay(): string
    {
        $dateTime = $this->dateTime ?? new DateTime();
        $currentHour = (int)$dateTime->format('G');

        if ($currentHour >= 0 && $currentHour < 6) {
            return 'Night';
        }

        if ($currentHour >= 6 && $currentHour < 12) {
            return 'Morning';
        }

        if ($currentHour >= 12 && $currentHour < 18) {
            return 'Afternoon';
        }

        return 'Evening';
    }
}
