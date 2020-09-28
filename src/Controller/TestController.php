<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }


    /**
     * @Route("/api/test", name="test")
    */
    public function index2()
    {
        $data = [
            'name' => 'iPhone X',
            'price' => 1000
        ];

        return new JsonResponse($data);
    }
}
