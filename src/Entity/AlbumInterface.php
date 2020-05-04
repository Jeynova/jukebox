<?php


namespace App\Entity;
use App\Entity\Track;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

interface AlbumInterface
{
    public function getAlbumName();

    public function getDuration();

    /**
     * @return Collection|Track[]
     */
    public function getTracks();

    public function getArtiste();

}