<?php

namespace Course\TieredPricingBundle\Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Course\TieredPricingBundle\Service\TieredPricingService;

class TiredPricingServiceTest extends TestCase
{
    private TieredPricingService $service;

    protected function setUp(): void
    {
        $this->service = new TieredPricingService();
    }


    /**
     * @test
     */
    public function itReturnsFirstRangePrices(): void
    {
        $price = $this->service->getUnitPriceBasedOnRange();
    }

}
