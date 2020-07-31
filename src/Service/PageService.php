<?php

namespace App\Service;

use App\Repository\PageRepository;
use Knp\Component\Pager\PaginatorInterface;
use App\ViewModel\PageListViewModel;

class PageService 
{
    private const MAX_RESULT = 5;
    protected $pageRepository;
    protected $paginator;
    
    public function __construct(
        PageRepository $pageRepository,
        PaginatorInterface $paginator
    ){
        $this->pageRepository = $pageRepository;
        $this->paginator = $paginator;
    }

    public function getPageListViewModel(int $page): PageListViewModel
    {
        $queryBuilder = $this->pageRepository->getPagesQueryBuilder();

        $paginator = $this->paginator->paginate($queryBuilder, $page, self::MAX_RESULT);

        $model = new PageListViewModel();
        $model->setPagination($paginator);

        return $model;
    }
}