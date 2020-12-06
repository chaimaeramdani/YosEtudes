<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
     * @ORM\OneToMany(targetEntity=Model::class, mappedBy="idCategorie")
     */
    private $models;

    /**
     * @ORM\OneToMany(targetEntity=SousCat::class, mappedBy="Model")
     */
    private $sousCats;

    public function __construct()
    {
        $this->models = new ArrayCollection();
        $this->sousCats = new ArrayCollection();
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

    /**
     * @return Collection|Model[]
     */
    public function getModels(): Collection
    {
        return $this->models;
    }

    public function addModel(Model $model): self
    {
        if (!$this->models->contains($model)) {
            $this->models[] = $model;
            $model->setIdCategorie($this);
        }

        return $this;
    }

    public function removeModel(Model $model): self
    {
        if ($this->models->contains($model)) {
            $this->models->removeElement($model);
            // set the owning side to null (unless already changed)
            if ($model->getIdCategorie() === $this) {
                $model->setIdCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SousCat[]
     */
    public function getSousCats(): Collection
    {
        return $this->sousCats;
    }

    public function addSousCat(SousCat $sousCat): self
    {
        if (!$this->sousCats->contains($sousCat)) {
            $this->sousCats[] = $sousCat;
            $sousCat->setModel($this);
        }

        return $this;
    }

    public function removeSousCat(SousCat $sousCat): self
    {
        if ($this->sousCats->contains($sousCat)) {
            $this->sousCats->removeElement($sousCat);
            // set the owning side to null (unless already changed)
            if ($sousCat->getModel() === $this) {
                $sousCat->setModel(null);
            }
        }

        return $this;
    }
}
