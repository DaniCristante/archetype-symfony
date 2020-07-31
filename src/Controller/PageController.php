<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\PageService;

class PageController extends AbstractController
{
    protected $service;

    public function __construct(
        PageService $service
    ){
        $this->service = $service;
    }

    public function list(Request $request)
    {
        $page = $request->get('page', 1);
        $model = $this->service->getPageListViewModel($page);
        dump($model);die();

        return $this->render('page/_list-page.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }
}
