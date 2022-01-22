<?php

namespace App\Entity;

use App\Repository\ReunionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity(repositoryClass=ReunionRepository::class)
 */
class Reunion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
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
    private $theme;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function __construct()
    {
        $this->created_at = new \DateTime();
    }

    /**
     * @ORM\Column(type="datetime")
     */
    private $prevu_at;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fait = false;

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

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getPrevuAt(): ?\DateTime
    {
        return $this->prevu_at;
    }

    public function setPrevuAt(\DateTime $prevu_at): self
    {
        $this->prevu_at = $prevu_at;

        return $this;
    }

    public function getFait(): ?bool
    {
        return $this->fait;
    }

    public function setFait(bool $fait): self
    {
        $this->fait = $fait;

        return $this;
    }

    public function __toString()
    {
        return $this->prevu_at;
    }
}
