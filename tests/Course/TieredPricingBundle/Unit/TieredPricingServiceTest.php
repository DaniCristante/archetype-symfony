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
    public function itReturnsFirstRangePrice(): void
    {
        $range = rand(1,2);
        $pricePerUnit = $this->service->getPricePerUnit($range);

        static::assertSame($pricePerUnit, 299);
    }

    /**
     * @test
     */
    public function itReturnsSecondRangePrice(): void
    {
        $range = rand(3,10);
        $pricePerUnit = $this->service->getPricePerUnit($range);

        static::assertSame($pricePerUnit, 239);
    }

    /**
     * @test
     */
    public function itReturnsThirdRangePrice(): void
    {
        $range = rand(11,25);
        $pricePerUnit = $this->service->getPricePerUnit($range);

        static::assertSame($pricePerUnit, 219);
    }

    /**
     * @test
     */
    public function itReturnsFourthRangePrice(): void
    {
        $range = rand(26,50);
        $pricePerUnit = $this->service->getPricePerUnit($range);

        static::assertSame($pricePerUnit, 199);
    }

    /**
     * @test
     */
    public function itReturnsFifthRangePrice(): void
    {
        $range = rand(51, 100000);
        $pricePerUnit = $this->service->getPricePerUnit($range);

        static::assertSame($pricePerUnit, 149);
    }

    /**
     * @test
     */
    public function itReturnsCalculatedTotalPrice()
    {
        $range = rand(1, 80);
        $pricePerUnit = $this->service->getPricePerUnit($range);
        $totalPrice = $range * $pricePerUnit;

        static::assertSame($totalPrice, $this->service->getTotalPrice($range));
    }
}
