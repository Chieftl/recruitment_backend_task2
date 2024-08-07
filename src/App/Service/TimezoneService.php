<?php

namespace App\Service;

use DateTime;
use DateTimeZone;

class TimezoneService
{
    public function offsetInMinutes(string $timezone): ?string
    {
        $timezone = new DateTimeZone($timezone);
        $offsetSeconds = $timezone->getOffset(new DateTime());
        $offsetMinutes = $offsetSeconds / 60;

        $sign = $offsetMinutes > 0 ? '+' : '-';
        return $sign . $offsetMinutes;
    }

    public function februaryLength(DateTime $date): ?int
    {
        $currentYear = $date->format('d');
        $february = new DateTime("$currentYear-02-01");

        return (int) $february->format('t');
    }

    public function getFields(DateTime $date, string $timezone): array
    {
        return [
            'timezone' => $timezone,
            'offsetMinutes' => $this->offsetInMinutes($timezone),
            'februaryLength' => $this->februaryLength($date),
            'monthName' => $date->format('F'),
            'monthLength' => (int) $date->format('t'),
        ];
    }
}