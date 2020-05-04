<?php

namespace App\Entity;

use App\Entity\AlbumInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlbumRepository")
 */
class Album implements AlbumInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */z
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $albumName;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Track", mappedBy="albums")
     */
    private $tracks;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Artiste", inversedBy="albums")
     */
    private $artiste;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\AbstractMedia", mappedBy="albums")
     */
    private $abstractMedia;

    public function __construct()
    {
        $this->tracks = new ArrayCollection();
        $this->abstractMedia = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlbumName(): ?string
    {
        return $this->albumName;
    }

    public function setAlbumName(string $albumName): self
    {
        $this->albumName = $albumName;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return Collection|Track[]
     */
    public function getTracks(): Collection
    {
        return $this->tracks;
    }

    public function addTrack(Track $track): self
    {
        if (!$this->tracks->contains($track)) {
            $this->tracks[] = $track;
            $track->addAlbum($this);
        }

        return $this;
    }

    public function removeTrack(Track $track): self
    {
        if ($this->tracks->contains($track)) {
            $this->tracks->removeElement($track);
            $track->removeAlbum($this);
        }

        return $this;
    }

    public function getArtiste(): ?Artiste
    {
        return $this->artiste;
    }

    public function setArtiste(?Artiste $artiste): self
    {
        $this->artiste = $artiste;

        return $this;
    }

    /**
     * @return Collection|AbstractMedia[]
     */
    public function getAbstractMedia(): Collection
    {
        return $this->abstractMedia;
    }

    public function addAbstractMedium(AbstractMedia $abstractMedium): self
    {
        if (!$this->abstractMedia->contains($abstractMedium)) {
            $this->abstractMedia[] = $abstractMedium;
            $abstractMedium->addAlbum($this);
        }

        return $this;
    }

    public function removeAbstractMedium(AbstractMedia $abstractMedium): self
    {
        if ($this->abstractMedia->contains($abstractMedium)) {
            $this->abstractMedia->removeElement($abstractMedium);
            $abstractMedium->removeAlbum($this);
        }

        return $this;
    }
}
