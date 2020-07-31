<?php

namespace App\Service;

use App\Repository\ArticleRepository;
use Knp\Component\Pager\PaginatorInterface;
use App\ViewModel\ArticleListViewModel;

class ArticleService 
{
    private const MAX_RESULT = 5;
    protected $articleRepository;
    protected $paginator;
    
    public function __construct(
        ArticleRepository $articleRepository,
        PaginatorInterface $paginator
    ){
        $this->articleRepository = $articleRepository;
        $this->paginator = $paginator;
    }

    public function getArticleListViewModel(int $page): ArticleListViewModel
    {
        $queryBuilder = $this->articleRepository->getArticlesQueryBuilder();

        $paginator = $this->paginator->paginate($queryBuilder, $page, self::MAX_RESULT);

        $model = new ArticleListViewModel();
        $model->setPagination($paginator);

        return $model;
    }
}