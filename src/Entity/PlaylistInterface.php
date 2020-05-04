<?php


namespace App\Entity;


use App\Entity\Track;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

Interface PlaylistInterface
{
    public function getPlaylistName(): ?string;

    public function getDuration(): ?int;

    /**
     * @return Collection|Track[]
     */
    public function getTracks(): Collection;



}