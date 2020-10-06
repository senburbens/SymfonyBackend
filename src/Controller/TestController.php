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
     * @Route("/api/test", name="test")
    */
    public function index(SiteConsultationService $siteConsultationService)
    {
        //$siteConsultation = $siteConsultationService->findOneByCode("spo2");
        $siteConsultationAll = $siteConsultationService->findAll();

        return $this->json($siteConsultationAll);
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
