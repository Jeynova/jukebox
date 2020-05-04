<?php

namespace App\Entity;

use App\Entity\TrackInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrackRepository")
 */
class Track implements TrackInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $trackLength;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $trackName;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Playlist", inversedBy="tracks")
     */
    private $playlists;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Artiste", inversedBy="tracks",cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $artists;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Album", inversedBy="tracks")
     */
    private $albums;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\AbstractMedia", mappedBy="tracks")
     */
    private $abstractMedia;

    public function __construct()
    {
        $this->playlists = new ArrayCollection();
        $this->albums = new ArrayCollection();
        $this->abstractMedia = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrackLength(): ?int
    {
        return $this->trackLength;
    }

    public function setTrackLength(int $trackLength): self
    {
        $this->trackLength = $trackLength;

        return $this;
    }

    public function getTrackName(): ?string
    {
        return $this->trackName;
    }

    public function setTrackName(string $trackName): self
    {
        $this->trackName = $trackName;

        return $this;
    }

    /**
     * @return Collection|Playlist[]
     */
    public function getPlaylists(): Collection
    {
        return $this->playlists;
    }

    public function addPlaylist(Playlist $playlist): self
    {
        if (!$this->playlists->contains($playlist)) {
            $this->playlists[] = $playlist;
        }

        return $this;
    }

    public function removePlaylist(Playlist $playlist): self
    {
        if ($this->playlists->contains($playlist)) {
            $this->playlists->removeElement($playlist);
        }

        return $this;
    }

    public function getArtists(): ?Artiste
    {
        return $this->artists;
    }

    public function setArtists(?Artiste $artists): self
    {
        $this->artists = $artists;

        return $this;
    }

    /**
     * @return Collection|Album[]
     */
    public function getAlbums(): Collection
    {
        return $this->albums;
    }

    public function addAlbum(Album $album): self
    {
        if (!$this->albums->contains($album)) {
            $this->albums[] = $album;
        }

        return $this;
    }

    public function removeAlbum(Album $album): self
    {
        if ($this->albums->contains($album)) {
            $this->albums->removeElement($album);
        }

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
            $abstractMedium->addTrack($this);
        }

        return $this;
    }

    public function removeAbstractMedium(AbstractMedia $abstractMedium): self
    {
        if ($this->abstractMedia->contains($abstractMedium)) {
            $this->abstractMedia->removeElement($abstractMedium);
            $abstractMedium->removeTrack($this);
        }

        return $this;
    }
}
