<?php

namespace DDosTracker;

class DDosTrackerHandler
{
    const TIMEZONES_NAMES_BY_OFFSET = [
        12 => 'Asia/Kamchatka',
        11 => 'Asia/Magadan',
        10 => 'Asia/Vladivostok',
        9 => 'Asia/Seoul',
        8 => 'Asia/Hong_Kong',
        7 => 'Indian/Christmas',
        6 => 'Antarctica/Vostok',
        5 => 'Asia/Oral',
        4 => 'Europe/Astrakhan',
        3 => 'Europe/Moscow',
        2 => 'Africa/Cairo',
        1 => 'Africa/Casablanca',
        0 => 'America/Danmarkshavn',
        -1 => 'Atlantic/Cape_Verde',
        -2 => 'America/Noronha',
        -3 => 'America/Buenos_Aires',
        -4 => 'America/Puerto_Rico',
        -5 => 'America/Rio_Branco',
        -6 => 'America/Tegucigalpa',
        -7 => 'America/Phoenix',
        -8 => 'Pacific/Pitcairn',
        -9 => 'Pacific/Gambier',
        -10 => 'Pacific/Tahiti',
        -11 => 'Pacific/Samoa',
    ];

    public function resolve(string $localTime): string
    {
        $currentDateTime = (new \DateTimeImmutable('now'))->format('H');
        $dateTimeInRandomTimezone = (\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $localTime))->format('H');

        $differenceInHoursBetweenDates = $this->getDifferenceInHoursBetweenDates(
            $dateTimeInRandomTimezone,
            $currentDateTime
        );

        if ($differenceInHoursBetweenDates < 0 && $differenceInHoursBetweenDates <= -12) {
            $differenceInHoursBetweenDates += 24;
        }

        return self::TIMEZONES_NAMES_BY_OFFSET[$differenceInHoursBetweenDates];
    }

    private function getDifferenceInHoursBetweenDates(
        int $dateTimeInRandomTimezone,
        int $currentDateTime
    ): int
    {
        return $dateTimeInRandomTimezone - $currentDateTime;
    }
}
