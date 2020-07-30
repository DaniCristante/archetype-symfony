<?php

namespace App\Repository;

use App\Entity\Page;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;

class PageRepository 
{
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getPagesQueryBuilder()
    {
        return $this->entityManager->createQueryBuilder()
            ->select('page')
            ->from('App\Entity\Page', 'page');
    }
}
