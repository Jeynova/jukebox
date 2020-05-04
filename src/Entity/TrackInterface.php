<?php


namespace App\Entity;


use App\Entity\Album;
use App\Entity\Artiste;
use App\Entity\Playlist;
use Doctrine\Common\Collections\Collection;

interface TrackInterface
{
    public function getArtists(): ?Artiste;

    public function getTrackName();

    public function getTrackLength();

    /**
     * @return Collection|Playlist[]
     */
    public function getPlaylists(): Collection;

    /**
     * @return Collection|Album[]
     */
    public function getAlbums(): Collection;


}