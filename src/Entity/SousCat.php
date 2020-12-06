<?php

namespace App\Entity;

use App\Repository\SousCatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SousCatRepository::class)
 */
class SousCat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="sousCats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Element;

    /**
     * @ORM\OneToOne(targetEntity=CodeElement::class, mappedBy="SousCat", cascade={"persist", "remove"})
     */
    private $codeElement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?Categorie
    {
        return $this->Model;
    }

    public function setModel(?Categorie $Model): self
    {
        $this->Model = $Model;

        return $this;
    }

    public function getElement(): ?string
    {
        return $this->Element;
    }

    public function setElement(string $Element): self
    {
        $this->Element = $Element;

        return $this;
    }

    public function getCodeElement(): ?CodeElement
    {
        return $this->codeElement;
    }

    public function setCodeElement(CodeElement $codeElement): self
    {
        $this->codeElement = $codeElement;

        // set the owning side of the relation if necessary
        if ($codeElement->getSousCat() !== $this) {
            $codeElement->setSousCat($this);
        }

        return $this;
    }
}
