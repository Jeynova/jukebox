<?php


namespace App\Manager\Export\Generator;


use App\Gateway\PlaylistGateway;
use App\Gateway\TrackGateway;
use App\Entity\PlaylistInterface;
use App\Entity\ArtisteInterface;

Abstract class AbstractExportGenerator implements ExportGeneratorInterface
{   protected $trackGateway;

    public function __construct(TrackGateway $trackGateway)
    {
        $this->trackGateway = $trackGateway;
    }

    public function doesHandle(Array $criteria):bool
    {

    }

    public function generateFile(Array $criteria)
    {


    }

    public function fetchTracks()
    {
        $allItems = $this->trackGateway->fetchAllGateway();

        return $allItems;
    }
    public function formatData()
    {
        $dataArray = [];
        $tracks = $this->fetchTracks();
        foreach ( $tracks as $track)
        {
            $dataArray["Title"]=$track->getTrackName();
            $dataArray["Length"]=$track->getTrackLength();
            $artist = $track->getArtist();
            $dataArray["Artist"]=$artist->getName();
        }
        return $dataArray;
    }


}