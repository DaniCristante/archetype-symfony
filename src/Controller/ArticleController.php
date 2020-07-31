<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\ArticleService;

class ArticleController extends AbstractController
{
    protected $service;

    public function __construct(ArticleService $service)
    {
        $this->service = $service;
    }

    public function list(Request $request)
    {
        $page = $request->get('page', 1);
        $model = $this->service->getArticleListViewModel($page);

        dump($model);die();
        return $this->render('page/_list-page.html.twig', [
            'controller_name' => 'PageController',
            'model' => $model,
        ]);
    }
}
