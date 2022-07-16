<?php

namespace App\Course\TieredPricingBundle\Service;

use App\Course\TieredPricingBundle\Entity\Course;

class TieredPricingService
{
    public function getPricePerUnit(int $quantity): int
    {
        $course = new Course();

        return $course->getUnitaryPrice($quantity);
    }

    public function getTotalPrice(int $range): int
    {
        $course = new Course();

        return $course->getTotalPrice($range);
    }
}
