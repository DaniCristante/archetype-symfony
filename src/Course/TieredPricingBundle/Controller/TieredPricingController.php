<?php

namespace App\Course\TieredPricingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TieredPricingController extends AbstractController
{
    public function pricing(): Response
    {
        return new Response('hola');
    }
}
