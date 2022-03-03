<?php

namespace App\Entity;

use App\Repository\OffersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffersRepository::class)
 */
class Offers
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
    private $Creator;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $modifier;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creation_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modifier_date;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\ManyToOne(targetEntity=TypeOfDelivery::class, inversedBy="offers")
     */
    private $offers_delivery;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $delivery;

    /**
     * @ORM\ManyToOne(targetEntity=BenefitType::class, inversedBy="offers")
     */
    private $offer_benefit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreator(): ?string
    {
        return $this->Creator;
    }

    public function setCreator(string $Creator): self
    {
        $this->Creator = $Creator;

        return $this;
    }

    public function getModifier(): ?string
    {
        return $this->modifier;
    }

    public function setModifier(?string $modifier): self
    {
        $this->modifier = $modifier;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getModifierDate(): ?\DateTimeInterface
    {
        return $this->modifier_date;
    }

    public function setModifierDate(?\DateTimeInterface $modifier_date): self
    {
        $this->modifier_date = $modifier_date;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getOffersDelivery(): ?TypeOfDelivery
    {
        return $this->offers_delivery;
    }

    public function setOffersDelivery(?TypeOfDelivery $offers_delivery): self
    {
        $this->offers_delivery = $offers_delivery;

        return $this;
    }

    public function getDelivery(): ?float
    {
        return $this->delivery;
    }

    public function setDelivery(float $delivery): self
    {
        $this->delivery = $delivery;

        return $this;
    }

    public function getOfferBenefit(): ?BenefitType
    {
        return $this->offer_benefit;
    }

    public function setOfferBenefit(?BenefitType $offer_benefit): self
    {
        $this->offer_benefit = $offer_benefit;

        return $this;
    }
}
