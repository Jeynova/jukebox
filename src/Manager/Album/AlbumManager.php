<?php


namespace App\Manager\Album;


class AlbumManager
{

    public function __construct(AlbumGateway $albumGateway)
    {
        $this->albumGateway = $albumGateway;
    }

    public function generateRandomAlbum($rand)
    {
        $randAlbum= $this->albumGateway->fetchAllGateway();




        return $randAlbum;
    }
}