<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PageRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class PageController extends AbstractController
{
    protected $pageRepository;
    protected $paginator;

    public function __construct(
        PageRepository $pageRepository,
        PaginatorInterface $paginator
    ){
        //Usar PageService y RendererService
        $this->pageRepository = $pageRepository;
        $this->paginator = $paginator;
    }

    public function index(Request $request)
    {
        $page = $request->get('page', 1);
        //mover llamada repository a PageService, retornar modelo.
        $queryBuilder = $this->pageRepository->getPagesQueryBuilder();
        
        $pagination = $this->paginator->paginate($queryBuilder, $page, 5);

        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
            'pagination' => $pagination
        ]);
    }
}
