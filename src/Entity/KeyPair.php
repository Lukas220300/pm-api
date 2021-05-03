<?php

namespace App\Entity;

use App\Repository\KeyPairRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KeyPairRepository::class)
 */
class KeyPair
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="PublicKey")
     */
    protected PublicKey $publicKey;

    /**
     * @ORM\OneToOne(targetEntity="PrivateKey")
     */
    protected PrivateKey $privateKey;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return PublicKey
     */
    public function getPublicKey(): PublicKey
    {
        return $this->publicKey;
    }

    /**
     * @param PublicKey $publicKey
     */
    public function setPublicKey(PublicKey $publicKey): void
    {
        $this->publicKey = $publicKey;
    }

    /**
     * @return PrivateKey
     */
    public function getPrivateKey(): PrivateKey
    {
        return $this->privateKey;
    }

    /**
     * @param PrivateKey $privateKey
     */
    public function setPrivateKey(PrivateKey $privateKey): void
    {
        $this->privateKey = $privateKey;
    }

}
