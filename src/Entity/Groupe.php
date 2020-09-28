<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use App\Repository\GroupeRepository;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GroupeRepository::class)
 */
class Groupe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="id_groupe")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, name="libelle_groupe")
     * @Groups({"user:read", "user:write"})
     */
    private $libelle;

    /**
     * @Groups({"user:read", "user:write"})
     * @ORM\Column(type="string", length=255, nullable=true, name="statut_groupe")
     */
    private $statut;

    /**
     *  @OneToMany(targetEntity=User::class, mappedBy="groupe")
     *  @JoinColumn(name="id_groupe", referencedColumnName="id_groupe")
    */
    private $users;


    public function __construct()
    {
        $this->users = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getUsers(): ArrayCollection
    {
        return $this->users;
    }

  public function addUser(User $user): self
    {
        //$this->users = $user;
        return $this; 
    }

    public function removeUser(User $user): self
    {
        //$this->users = $user;
        return $this; 
    } 
}
