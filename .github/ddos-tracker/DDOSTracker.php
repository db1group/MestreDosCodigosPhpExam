<?php

namespace MestreCodigo\DDOSTracker;

class DDOSTracker {

    public function findPossibleTimezoneName(string $datetime): string {
        $receiveDatetime = new \DateTime($datetime);

        $timezone_identifiers = \DateTimeZone::listIdentifiers();
        $dateWithTimezone = new \DateTime('now');

        foreach ($timezone_identifiers as $timezone) {
            $dateWithTimezone->setTimezone(new \DateTimeZone($timezone));

            if (
                $dateWithTimezone->format('d') == $receiveDatetime->format('d') &&
                $dateWithTimezone->format('H') == $receiveDatetime->format('H')
            ) {
                return $timezone;
            }
        }
        throw new \UnexpectedValueException();
    }
}