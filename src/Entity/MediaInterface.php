<?php


namespace App\Entity;
use App\Entity\TrackInterface;
use Doctrine\Common\Collections\Collection;


interface MediaInterface
{


    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return Collection|Album[]
     */
    public function getAlbums(): Collection;

    public function addAlbum(Album $album);

    public function removeAlbum(Album $album);

    /**
     * @return Collection|Track[]
     */
    public function getTracks(): Collection;

    public function addTrack(Track $track);

    public function removeTrack(Track $track);



}
