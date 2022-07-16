<?php

namespace App\Course\TieredPricingBundle\Entity;

class Course
{
    private const FIRST_RANGE_PRICE = 299;
    private const SECOND_RANGE_PRICE = 239;
    private const THIRD_RANGE_PRICE = 219;
    private const FOURTH_RANGE_PRICE = 199;
    private const FIFTH_RANGE_PRICE = 149;

    private const MAX_UNITS_FIRST_RANGE = 2;
    private const MAX_UNITS_SECOND_RANGE = 10;
    private const MAX_UNITS_THIRD_RANGE = 25;
    private const MAX_UNITS_FOURTH_RANGE = 50;

    private const PRICE_RANGES = [
        self::MAX_UNITS_FIRST_RANGE => self::FIRST_RANGE_PRICE,
        self::MAX_UNITS_SECOND_RANGE => self::SECOND_RANGE_PRICE,
        self::MAX_UNITS_THIRD_RANGE => self::THIRD_RANGE_PRICE,
        self::MAX_UNITS_FOURTH_RANGE => self::FOURTH_RANGE_PRICE
    ];

    public function getUnitaryPrice(int $quantity): int
    {
        foreach (self::PRICE_RANGES as $maxUnitsPerRange => $unitPrice) {
            if ($quantity <= $maxUnitsPerRange) {
                return $unitPrice;
            }
        }

        return self::FIFTH_RANGE_PRICE;
    }

    public function getTotalPrice(int $quantity): int
    {
        return $quantity * $this->getUnitaryPrice($quantity);
    }
}

