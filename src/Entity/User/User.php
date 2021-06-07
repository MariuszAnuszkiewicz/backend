<?php

namespace App\Entity\User;

use App\Repository\User\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table("users")
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "login field can't be empty")
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="The login must be at least 3 characters long",
     *     maxMessage="The login cannot be longer than 255 characters"
     * )
     * @Assert\Regex(
     *     pattern="/^[A-Za-z0-9]+$/",
     *     message="Letters and digits allowed"
     * )
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Assert\NotBlank(message = "state field can't be empty")
     * @Assert\Length(
     *     min=3,
     *     max=50,
     *     minMessage="The state must be at least 3 characters long",
     *     maxMessage="The state cannot be longer than 50 characters"
     * )
     * @Assert\Regex(
     *     pattern="/^[A-Za-z]+$/",
     *     message="Only letters allowed"
     * )
     */
    private $state;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Product\Product")
     * @ORM\JoinTable(
     *     name="user_product",
     *     joinColumns={
     *          @ORM\JoinColumn(name="user_id", referencedColumnName="id" onDelete="CASCADE")
     *     },
     *     inverseJoinColumns={
     *          @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *     }
     * )
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getProducts(): ArrayCollection
    {
        return $this->products;
    }

    public function addProduct(Product\Product $product): self
    {
        if ($this->products->contains($product)) {
            return;
        }
        $this->products[] = $product;
    }

    public function removeProduct(Product\Product $product): bool
    {
        return $this->products->removeElement($product);
    }
}
