<?php

namespace App\Entity;

use App\Repository\EntryRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntryRepository::class)
 */
class Entry
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10000)
     */
    protected string $content;

    /**
     * @ORM\Column(type="datetime")
     */
    protected DateTime $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected DateTime $lastModify;

    /**
     * @ORM\OneToOne(targetEntity="SymmetricKey")
     */
    protected SymmetricKey $symmetricKey;

    /**
     * @ORM\ManyToOne(targetEntity="EntryType")
     */
    protected EntryType $type;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="entries")
     */
    protected $tags;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
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
    public function getLastModify(): DateTime
    {
        return $this->lastModify;
    }

    /**
     * @param DateTime $lastModify
     */
    public function setLastModify(DateTime $lastModify): void
    {
        $this->lastModify = $lastModify;
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
     * @return EntryType
     */
    public function getType(): EntryType
    {
        return $this->type;
    }

    /**
     * @param EntryType $type
     */
    public function setType(EntryType $type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags): void
    {
        $this->tags = $tags;
    }

}
