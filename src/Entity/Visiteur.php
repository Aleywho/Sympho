<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VisiteurRepository")
 */
class Visiteur
{
    /**
     * @Assert\Callback
     */


    private $visitTime;

    public function Validation(ExecutionContextInterface $context, $payload)
    {
$wrongHours = [''];
        if (in_array($this->getVisitTime(), $wrongHours)) {
            $context->buildViolation('This name sounds totally fake!')
                ->atPath('firstName')
                ->addViolation();
        }
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="float", )
     */
    private $total;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbBillet;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Billet", mappedBy="visiteur", orphanRemoval=true, cascade={"persist", "remove"})
     *
     */
    private $billets;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateVisit;


    public function __construct()
    {
        $this->billets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getNbBillet(): ?int
    {
        return $this->nbBillet;
    }

    public function setNbBillet(int $nbBillet): self
    {
        $this->nbBillet = $nbBillet;

        return $this;
    }

    /**
     * @return Collection|Billet[]
     */
    public function getBillets(): Collection
    {
        return $this->billets;
    }

    public function addBillet(Billet $billet): self
    {
        if (!$this->billets->contains($billet)) {
            $this->billets[] = $billet;
            $billet->setVisiteur($this);
            $this->nbBillet += 1;
        }

        return $this;
    }

    public function removeBillet(Billet $billet): self
    {
        if ($this->billets->contains($billet)) {
            $this->billets->removeElement($billet);
            // set the owning side to null (unless already changed)
            if ($billet->getVisiteur() === $this) {
                $billet->setVisiteur(null);
            }
        }

        return $this;
    }

    public function getDateVisit(): ?\DateTimeInterface
    {

        return $this->dateVisit;
    }

    public function setDateVisit(\DateTimeInterface $dateVisit): self
    {
        $this->dateVisit = $dateVisit;

        return $this;
    }


}
