<?php

namespace App\Entity;

use App\Entity\Groupe;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity("login")
 * @Table(name="utilisateur")
 * @ApiResource(
 *    normalizationContext={"groups"={"user:read"}},
 *    denormalizationContext={"groups"={"user:write"}}
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="id_utilisateur")
     * @Groups("user:read")
     */
    private $id;

    /**
     * @Column(name="login_utilisateur", length=180, unique=true)
     * @ORM\Column(type="string")
     * @Groups({"user:read", "user:write"})
     * @Assert\NotNull
    */
    private $login;

    /**
     * @ORM\Column(name="email_utilisateur", length=180, unique=true)
     * @ORM\Column(type="string")
     * @Groups({"user:read", "user:write"})
     * @Assert\NotNull
     */
    private $email;

    /**
     * 
     */
    //@ORM\Column(type="json")
    private $roles = [];

    /**
     *  @Groups({"user:read"})
     *  @ManyToOne(targetEntity=Groupe::class, inversedBy="users")
     *  @JoinColumn(name="id_groupe", referencedColumnName="id_groupe")
    */
    private $groupe;


    public function getGroupe(): ?Groupe
    {
        return $this->groupe;
    }

    public function setGroupe(Groupe $groupe)
    {
        $this->groupe = $groupe;
    }        

    /**
     * @Column(name="nom_utilisateur")
     * @ORM\Column(type="string")
     * @Groups({"user:read", "user:write"})
     * @Assert\NotNull
    */
    private $nom;

    /**
     * @Column(name="prenom_utilisateur")
     * @ORM\Column(type="string")
     * @Groups({"user:read", "user:write"})
     * @Assert\NotNull
     */
    private $prenom;

    /**
     * @Column(name="adresse_utilisateur")
     * @ORM\Column(type="string")
     * @Groups({"user:read", "user:write"})
     * @Assert\NotNull
    */
    private $adresse;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string", name="pwd_utilisateur")
    */
    private $password;

    /**
     * @var string The hashed password
     * @Groups("user:write")
     * @SerializedName("password")
    */
    private $plainPassword;


    public function __construct()
    {
        // $this->roles = new ArrayCollection();
    }
    


    public function getId(): ?int
    {
        return $this->id;
    }

    // Getter et Setter pour le nom de l'utilisateur
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }    

    // Getter et Setter pour le nom de l'utilisateur
    public function getLogin(): ?string
    {
        return $this->login;
    }
    
    public function setLogin($login)
    {
        $this->login = $login;
    }



    // Getter et Setter pour le prenom de l'utilisateur
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }


    // Getter et Setter pour l'adresse de l'utilisateur
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->login;
    }


    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        $roles[] = 'ROLE_' . strtoupper( $this->getGroupe()->getLibelle());

        return array_unique($roles);
    } 

/*     public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    } */

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    public function getPlainPassword(): string
    {
        return (string) $this->plain_password;
    }

    public function setPlainPassword(string $plain_password): self
    {
        $this->plain_password = $plain_password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        $this->plainPassword = null;
    }
}
