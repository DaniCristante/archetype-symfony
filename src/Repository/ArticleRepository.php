<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;

class ArticleRepository
{
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getArticlesQueryBuilder()
    {
        return $this->entityManager->createQueryBuilder()
            ->select('article')
            ->from('App\Entity\Article', 'article');
    }
}
