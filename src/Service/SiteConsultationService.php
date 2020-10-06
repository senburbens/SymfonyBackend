<?php

namespace App\Service;

use App\Entity\SiteConsultation;
use App\Repository\SiteTypeRepository;
use App\Repository\SiteConsultationRepository;

class SiteConsultationService
{
    private $siteTypeRepository;
    private $siteConsultationRepository;

    public function __construct(SiteTypeRepository $siteTypeRepository, SiteConsultationRepository $siteConsultationRepository){ 
        $this->siteTypeRepository = $siteTypeRepository;
        $this->siteConsultationRepository = $siteConsultationRepository;
    }

    public function findOneByCode($value) : ?SiteConsultation
    {
        return $this->siteConsultationRepository->findOneByCode($value);
    }  

    public function findAll()
    {
        return $this->siteConsultationRepository->testQuery2();
    }
}