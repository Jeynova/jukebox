<?php


namespace App\Manager;

use App\Entity\Playlist;
use App\Entity\PlaylistInterface;
use App\Gateway\TrackGateway;

class TrackManager
{

    /** @var TrackGateway */
    protected $trackGateway;

    /**
     * TrackManager constructor.
     * @param TrackGateway $trackGateway
     */

    public function __construct(TrackGateway $trackGateway)
    {
        $this->trackGateway = $trackGateway;
    }

    public function generateRandomPlaylist($rand)
    {

        $newPlaylist = new Playlist();
        $index =0;
        $randPlaylist= $this->trackGateway->fetchAllGateway();

        shuffle($randPlaylist);

        foreach ($randPlaylist as $track) {

            switch(true)
            {
                case  $index <= $rand :
                    $newPlaylist->setTracks($track);
                    break;

                case $index > $rand :
                    break;
            }
            $index++;



        }



        return $newPlaylist;
    }


}