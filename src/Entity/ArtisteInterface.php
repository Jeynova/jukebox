<?php


namespace App\Entity;


use App\Entity\Album;
use App\Entity\Track;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

interface ArtisteInterface
{
    public function getArtistName(): ?string;

    public function getCountry(): ?string;

    public function getStyle(): ?string;

    /**
     * @return Collection|Track[]
     */
    public function getTracks(): Collection;

    /**
     * @return Collection|Album[]
     */
    public function getAlbums(): Collection;
}