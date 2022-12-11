<?php

namespace App\Entity;

use App\Repository\OrderDetailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderDetailRepository::class)]
class OrderDetail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $seancePrice = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\ManyToOne(inversedBy: 'OrderDetail')]
    private ?Order $orderMain = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeancePrice(): ?float
    {
        return $this->seancePrice;
    }

    public function setSeancePrice(float $seancePrice): self
    {
        $this->seancePrice = $seancePrice;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getOrderMain(): ?Order
    {
        return $this->orderMain;
    }

    public function setOrderMain(?Order $orderMain): self
    {
        $this->orderMain = $orderMain;

        return $this;
    }
}
