<?php

namespace App\Entity\Product;

use App\Repository\Product\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ORM\Table("products")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "name field can't be empty")
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="The name must be at least 3 characters long",
     *     maxMessage="The name cannot be longer than 255 characters"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\NotBlank(message = "info field can't be empty")
     */
    private $info;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotNull()
     */
    private $public_date;

    /**
     * @ORM\Column(type="decimal", precision=7, scale=2)
     * @Assert\NotBlank(message="price field can't be empty")
     *
     */
    private $price;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User\User")
     * @ORM\JoinTable(
     *     name="user_product",
     *     joinColumns={
     *          @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *          @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *     }
     * )
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

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

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function getPublicDate(): ?\DateTimeInterface
    {
        return $this->public_date;
    }

    public function setPublicDate(\DateTimeInterface $public_date): self
    {
        $this->public_date = $public_date;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getUsers(): Collection
    {
        return $this->users;
    }
}
