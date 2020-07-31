<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\ArticleService;
use App\Service\PageRendererService;

class ArticleController extends AbstractController
{
    protected $service;
    protected $renderer;

    public function __construct(PageRendererService $renderer, ArticleService $service)
    {
        $this->renderer = $renderer;
        $this->service = $service;
    }

    public function list(Request $request)
    {
        $page = $request->get('page', 1);
        $model = $this->service->getArticleListViewModel($page);
        return $this->renderer->renderResponse('pages/_list-page.html.twig', $model);
    }
}
