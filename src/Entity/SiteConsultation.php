<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SiteConsultationRepository;

/**
 * @ApiResource(
 *    normalizationContext={"groups"={"siteconsultation:read"}},
 *    denormalizationContext={"groups"={"siteconsultation:write"}}
 * )
 * @ORM\Entity(repositoryClass=SiteConsultationRepository::class)
 * @Table(name="site_consultation")
 */
class SiteConsultation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({ "siteconsultation:read", "sitetype:read" })
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({ "siteconsultation:read", "sitetype:read" })
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({ "siteconsultation:read", "sitetype:read" })
     */
    private $libelle;

    /**
     * @ORM\Column(type="text")
     * @Groups({ "siteconsultation:read", "sitetype:read" })
     */
    private $infos1;

    /**
     * @ORM\Column(type="text")
     * @Groups({ "siteconsultation:read", "sitetype:read" })
     */
    private $infos2;

    /**
     * @ORM\Column(type="string", length=1)
     * @Groups({ "siteconsultation:read", "sitetype:read" })
     */
    private $statut;

    /**
     * @ORM\Column(type="integer")
     * @Groups({ "siteconsultation:read", "sitetype:read" })
     */
    private $ordre;

    /**
     * @ORM\Column(type="integer")
     * @Groups({ "siteconsultation:read", "sitetype:read" })
     */
    private $specialite_med;

    /**
     * @ORM\ManyToOne(targetEntity=SiteType::class, inversedBy="siteConsultations")
     * @JoinColumn(name="type", referencedColumnName="id", nullable=false)
     * @Groups("siteconsultation:read")
     */
    private $type;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getInfos1(): ?string
    {
        return $this->infos1;
    }

    public function setInfos1(string $infos1): self
    {
        $this->infos1 = $infos1;

        return $this;
    }

    public function getInfos2(): ?string
    {
        return $this->infos2;
    }

    public function setInfos2(string $infos2): self
    {
        $this->infos2 = $infos2;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(int $ordre): self
    {
        $this->ordre = $ordre;

        return $this;
    }

    public function getSpecialiteMed(): ?int
    {
        return $this->specialite_med;
    }

    public function setSpecialiteMed(int $specialite_med): self
    {
        $this->specialite_med = $specialite_med;

        return $this;
    }

    public function getType(): ?SiteType
    {
        return $this->type;
    }

    public function setType(?SiteType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
