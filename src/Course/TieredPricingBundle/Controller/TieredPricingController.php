<?php

namespace App\Course\TieredPricingBundle\Controller;

use App\Course\TieredPricingBundle\Service\TieredPricingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TieredPricingController extends AbstractController
{
    private TieredPricingService $service;

    public function __construct(TieredPricingService $tieredPricingService)
    {
        $this->service = $tieredPricingService;
    }

    public function pricing(): Response
    {
        $range = rand(1, 70);

        $unit = $this->service->getPricePerUnitBaseOnRange($range);

        return new Response($unit);
    }
}
