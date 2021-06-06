<?php

namespace App\Entity\User;

use App\Repository\User\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table("users")
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
}
