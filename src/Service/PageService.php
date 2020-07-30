<?php

namespace App\Service;

use App\Repository\PageRepository;
use Knp\Component\Pager\PaginatorInterface;

class PageService 
{
    protected $pageRepository;
    protected $paginator;
    
    public function __construct(
        PageRepository $pageRepository,
        PaginatorInterface $paginator
    ){
        $this->pageRepository = $pageRepository;
        $this->paginator = $paginator;
    }
}