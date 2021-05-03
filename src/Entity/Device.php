<?php

namespace App\Entity;

use App\Repository\DeviceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeviceRepository::class)
 */
class Device
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    protected string $deviceIdentifier;

    /**
     * @ORM\Column(type="datetime")
     */
    protected \DateTime $firstLogin;

    /**
     * @ORM\Column(type="datetime")
     */
    protected \DateTime $lastLogin;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="devices")
     */
    protected $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDeviceIdentifier(): string
    {
        return $this->deviceIdentifier;
    }

    /**
     * @param string $deviceIdentifier
     */
    public function setDeviceIdentifier(string $deviceIdentifier): void
    {
        $this->deviceIdentifier = $deviceIdentifier;
    }

    /**
     * @return \DateTime
     */
    public function getFirstLogin(): \DateTime
    {
        return $this->firstLogin;
    }

    /**
     * @param \DateTime $firstLogin
     */
    public function setFirstLogin(\DateTime $firstLogin): void
    {
        $this->firstLogin = $firstLogin;
    }

    /**
     * @return \DateTime
     */
    public function getLastLogin(): \DateTime
    {
        return $this->lastLogin;
    }

    /**
     * @param \DateTime $lastLogin
     */
    public function setLastLogin(\DateTime $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

}
