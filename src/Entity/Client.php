<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    public $confirm_password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateNaissance;

    /**
     * @ORM\ManyToMany(targetEntity=Competence::class)
     */
    private $compt;

    /**
     * @ORM\ManyToMany(targetEntity=Experience::class)
     */
    private $exp;

    /**
     * @ORM\ManyToMany(targetEntity=Formation::class)
     */
    private $form;

    /**
     * @ORM\ManyToMany(targetEntity=Role::class, mappedBy="clients")
     */
    private $clientRoles;

    public function __construct()
    {
        $this->compt = new ArrayCollection();
        $this->exp = new ArrayCollection();
        $this->form = new ArrayCollection();
        $this->clientRoles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(string $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * @return Collection|competence[]
     */
    public function getCompt(): Collection
    {
        return $this->compt;
    }

    public function addCompt(competence $compt): self
    {
        if (!$this->compt->contains($compt)) {
            $this->compt[] = $compt;
        }

        return $this;
    }

    public function removeCompt(competence $compt): self
    {
        if ($this->compt->contains($compt)) {
            $this->compt->removeElement($compt);
        }

        return $this;
    }

    /**
     * @return Collection|experience[]
     */
    public function getExp(): Collection
    {
        return $this->exp;
    }

    public function addExp(experience $exp): self
    {
        if (!$this->exp->contains($exp)) {
            $this->exp[] = $exp;
        }

        return $this;
    }

    public function removeExp(experience $exp): self
    {
        if ($this->exp->contains($exp)) {
            $this->exp->removeElement($exp);
        }

        return $this;
    }

    /**
     * @return Collection|formation[]
     */
    public function getForm(): Collection
    {
        return $this->form;
    }

    public function addForm(formation $form): self
    {
        if (!$this->form->contains($form)) {
            $this->form[] = $form;
        }

        return $this;
    }

    public function removeForm(formation $form): self
    {
        if ($this->form->contains($form)) {
            $this->form->removeElement($form);
        }

        return $this;
    }

    /**
     * @return Collection|Role[]
     */
    public function getClientRoles(): Collection
    {
        return $this->clientRoles;
    }

    public function addClientRole(Role $clientRole): self
    {
        if (!$this->clientRoles->contains($clientRole)) {
            $this->clientRoles[] = $clientRole;
            $clientRole->addClient($this);
        }

        return $this;
    }

    public function removeClientRole(Role $clientRole): self
    {
        if ($this->clientRoles->contains($clientRole)) {
            $this->clientRoles->removeElement($clientRole);
            $clientRole->removeClient($this);
        }

        return $this;
    }
    public function getRole()
    {
        $roles=$this->clientRole->map(function($role)
        {return $role->getTitre();
        })->toArray();
        $roles[]= 'ROLE_CLIENT';
        return $roles;
    }
    
    public function eraseCredentials(){}
    public function getSalt(){}
    public function getRoles(){return ['ROLE_USER'];}
    public function getUsername() {
        return $this->email;
    }
}
