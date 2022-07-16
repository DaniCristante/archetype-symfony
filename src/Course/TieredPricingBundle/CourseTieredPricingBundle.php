<?php

namespace App\Course\TieredPricingBundle;

use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class CourseTieredPricingBundle extends AbstractBundle
{
    public function getPath(): string
    {
        return __DIR__;
    }
}
