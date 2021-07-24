<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AsymmetricKeyPairRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AsymmetricKeyPairRepository::class)
 */
#[ApiResource]
class AsymmetricKeyPair
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=7000, nullable=true)
     */
    private ?string $privateKey;

    /**
     * @ORM\Column(type="string", length=3000, nullable=true)
     */
    private ?string $publicKey;

    /**
     * @var User|null
     * @ORM\OneToOne(targetEntity="User", mappedBy="asymmetricKeyPair")
     */
    private ?User $owner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrivateKey(): ?string
    {
        return $this->privateKey;
    }

    public function setPrivateKey(?string $privateKey): self
    {
        $this->privateKey = $privateKey;

        return $this;
    }

    public function getPublicKey(): ?string
    {
        return $this->publicKey;
    }

    public function setPublicKey(?string $publicKey): self
    {
        $this->publicKey = $publicKey;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getOwner(): ?User
    {
        return $this->owner;
    }

    /**
     * @param User|null $owner
     */
    public function setOwner(?User $owner): void
    {
        $this->owner = $owner;
    }

}
