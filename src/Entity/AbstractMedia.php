<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\InheritanceType;

/**
 * @Entity
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="format", type="string")
 * @DiscriminatorMap({"media" = "AbstractMedia","cd"="CdMedia","flac" = "FlacMedia", "vinyl" = "VinylMedia"})
 */
abstract class AbstractMedia implements MediaInterface
{



    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Album", inversedBy="abstractMedia")
     */
    private $albums;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Track", inversedBy="abstractMedia")
     */
    private $tracks;

    public function __construct()
    {
        $this->albums = new ArrayCollection();
        $this->tracks = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Collection|Album[]
     */
    public function getAlbums(): Collection
    {
        return $this->albums;
    }

    public function addAlbum(Album $album)
    {
        if (!$this->albums->contains($album)) {
            $this->albums[] = $album;
        }

        return $this;
    }

    public function removeAlbum(Album $album)
    {
        if ($this->albums->contains($album)) {
            $this->albums->removeElement($album);
        }

        return $this;
    }

    /**
     * @return Collection|Track[]
     */
    public function getTracks(): Collection
    {
        return $this->tracks;
    }

    public function addTrack(Track $track)
    {
        if (!$this->tracks->contains($track)) {
            $this->tracks[] = $track;
        }

        return $this;
    }

    public function removeTrack(Track $track)
    {
        if ($this->tracks->contains($track)) {
            $this->tracks->removeElement($track);
        }

        return $this;
    }





}
