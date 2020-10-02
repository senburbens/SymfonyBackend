<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use App\Repository\SiteTypeRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *    normalizationContext={"groups"={"sitetype:read"}},
 *    denormalizationContext={"groups"={"sitetype:write"}}
 * )
 * @ORM\Entity(repositoryClass=SiteTypeRepository::class)
 * @Table(name="site_type")
 */
class SiteType
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
    
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=SiteConsultation::class, mappedBy="type")
     * @JoinColumn(name="id", referencedColumnName="type")
     * @Groups("sitetype:read")
     */
    private $siteConsultations;

    

    public function __construct()
    {
        $this->siteConsultations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|SiteConsultation[]
     */
    public function getSiteConsultations(): Collection
    {
        return $this->siteConsultations;
    }

    public function addSiteConsultation(SiteConsultation $siteConsultation): self
    {
        if (!$this->siteConsultations->contains($siteConsultation)) {
            $this->siteConsultations[] = $siteConsultation;
            $siteConsultation->setType($this);
        }

        return $this;
    }

    public function removeSiteConsultation(SiteConsultation $siteConsultation): self
    {
        if ($this->siteConsultations->contains($siteConsultation)) {
            $this->siteConsultations->removeElement($siteConsultation);
            // set the owning side to null (unless already changed)
            if ($siteConsultation->getType() === $this) {
                $siteConsultation->setType(null);
            }
        }

        return $this;
    }
}
