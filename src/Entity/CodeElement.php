<?php

namespace App\Entity;

use App\Repository\CodeElementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CodeElementRepository::class)
 */
class CodeElement
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
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type;

    /**
     * @ORM\OneToOne(targetEntity=SousCat::class, inversedBy="codeElement", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $SousCat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getSousCat(): ?SousCat
    {
        return $this->SousCat;
    }

    public function setSousCat(SousCat $SousCat): self
    {
        $this->SousCat = $SousCat;

        return $this;
    }
}
