<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ApiResource(
 *     attributes={"security"="is_granted('ROLE_RECRUITER')"},
 *     collectionOperations={
 *         "post"={"security"="is_granted('ROLE_RECRUITER')", "security_message"="Only Recruiter can add offers."},
 *         "get"={"security"="is_granted('ROLE_RECRUITER')"},
 *     },
 *     itemOperations={
 *         "get"={"security"="is_granted('ROLE_RECRUITER') and object.getOwner() == user or is_granted('ROLE_USER')", "security_message"="Sorry, but you are not the offer owner."},
 *         "put"={"security_post_denormalize"="is_granted('ROLE_RECRUITER') or (object.getOwner() == user and previous_object.getOwner() == user)", "security_post_denormalize_message"="Sorry, but you are not the actual offer owner."},
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\OfferRepository")
 */
class Offer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $companyDescription;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $offerDescription;

    /**
     * @ORM\Column(type="date")
     */
    private $startDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeOfContract;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $workplace;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="offers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCompanyDescription(): ?string
    {
        return $this->companyDescription;
    }

    public function setCompanyDescription(string $companyDescription): self
    {
        $this->companyDescription = $companyDescription;

        return $this;
    }

    public function getOfferDescription(): ?string
    {
        return $this->offerDescription;
    }

    public function setOfferDescription(string $offerDescription): self
    {
        $this->offerDescription = $offerDescription;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getTypeOfContract(): ?string
    {
        return $this->typeOfContract;
    }

    public function setTypeOfContract(string $typeOfContract): self
    {
        $this->typeOfContract = $typeOfContract;

        return $this;
    }

    public function getWorkplace(): ?string
    {
        return $this->workplace;
    }

    public function setWorkplace(string $workplace): self
    {
        $this->workplace = $workplace;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
