<?php

namespace App\Entity;

use App\Repository\EntryShareOverlayRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntryShareOverlayRepository::class)
 */
class EntryShareOverlay
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected DateTime $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected DateTime $expire;

    /**
     * @ORM\OneToOne(targetEntity="SymmetricKey")
     */
    protected SymmetricKey $symmetricKey;

    /**
     * @ORM\ManyToOne(targetEntity="Entry", inversedBy="overlays")
     */
    protected Entry $entry;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="sharedEntries")
     */
    protected User $userSharedWith;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated(DateTime $created): void
    {
        $this->created = $created;
    }

    /**
     * @return DateTime
     */
    public function getExpire(): DateTime
    {
        return $this->expire;
    }

    /**
     * @param DateTime $expire
     */
    public function setExpire(DateTime $expire): void
    {
        $this->expire = $expire;
    }

    /**
     * @return SymmetricKey
     */
    public function getSymmetricKey(): SymmetricKey
    {
        return $this->symmetricKey;
    }

    /**
     * @param SymmetricKey $symmetricKey
     */
    public function setSymmetricKey(SymmetricKey $symmetricKey): void
    {
        $this->symmetricKey = $symmetricKey;
    }

    /**
     * @return Entry
     */
    public function getEntry(): Entry
    {
        return $this->entry;
    }

    /**
     * @param Entry $entry
     */
    public function setEntry(Entry $entry): void
    {
        $this->entry = $entry;
    }

    /**
     * @return User
     */
    public function getUserSharedWith(): User
    {
        return $this->userSharedWith;
    }

    /**
     * @param User $userSharedWith
     */
    public function setUserSharedWith(User $userSharedWith): void
    {
        $this->userSharedWith = $userSharedWith;
    }

}
