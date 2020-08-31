<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use App\Repository\ParametersRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource()
 * @Table(name="parametre")
 * @ORM\Entity(repositoryClass=ParametersRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"code_param": "exact"})
 */
class Parameters
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer",name="id_param")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code_param;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle_param;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $valeur_param;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeParam(): ?string
    {
        return $this->code_param;
    }

    public function setCodeParam(string $code_param): self
    {
        $this->code_param = $code_param;

        return $this;
    }

    public function getLibelleParam(): ?string
    {
        return $this->libelle_param;
    }

    public function setLibelleParam(string $libelle_param): self
    {
        $this->libelle_param = $libelle_param;

        return $this;
    }

    public function getValeurParam(): ?string
    {
        return $this->valeur_param;
    }

    public function setValeurParam(string $valeur_param): self
    {
        $this->valeur_param = $valeur_param;

        return $this;
    }
}
