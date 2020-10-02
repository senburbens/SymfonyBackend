<?php

namespace App\Controller;

use App\Entity\SiteConsultation;
use App\Service\SiteConsultationService;
use App\Repository\SiteConsultationRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    public function index2(SiteConsultationService $siteConsultationService)
    {
        $siteConsultation = $siteConsultationService->findOneByCode("prescription");

        $data = [
            'name' => 'iPhone X',
            'price' => 1000
        ];

        //return new JsonResponse(json_encode($siteConsultation));
        return $this->json($siteConsultation);
    }


    /**
     * @Route("/api/siteconsultation/{code}", name="test")
    */
    //public function getOneSiteConsultationByCode(SiteConsultationService $siteConsultationService)
    //{
        //$data = [
            //'name' => 'iPhone X',
            //'price' => 1000
        //];

        //return new JsonResponse($data);
    //}
}
