<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?User $article = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    #[ORM\Column]
    private ?int $pricejeune = null;

    #[ORM\Column]
    private ?int $pricekid = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'user')]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'orderMain', targetEntity: OrderDetail::class)]
    private Collection $OrderDetail;

    public function __construct()
    {
        $this->OrderDetail = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticle(): ?User
    {
        return $this->article;
    }

    public function setArticle(?User $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPricejeune(): ?int
    {
        return $this->pricejeune;
    }

    public function setPricejeune(int $pricejeune): self
    {
        $this->pricejeune = $pricejeune;

        return $this;
    }

    public function getPricekid(): ?int
    {
        return $this->pricekid;
    }

    public function setPricekid(int $pricekid): self
    {
        $this->pricekid = $pricekid;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, OrderDetail>
     */
    public function getOrderDetail(): Collection
    {
        return $this->OrderDetail;
    }

    public function addOrderDetail(OrderDetail $OrderDetail): self
    {
        if (!$this->OrderDetail->contains($OrderDetail)) {
            $this->OrderDetail->add($OrderDetail);
            $OrderDetail->setOrderMain($this);
        }

        return $this;
    }

    public function removeOrderDetail(OrderDetail $OrderDetail): self
    {
        if ($this->OrderDetail->removeElement($OrderDetail)) {
            // set the owning side to null (unless already changed)
            if ($OrderDetail->getOrderMain() === $this) {
                $OrderDetail->setOrderMain(null);
            }
        }

        return $this;
    }
}
