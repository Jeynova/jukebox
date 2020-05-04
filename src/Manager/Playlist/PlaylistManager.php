<?php


namespace App\Manager\Playlist;


use App\Gateway\PlaylistGateway;

class PlaylistManager
{

    /** @var PlaylistGateway */
    protected $playlistGateway;

    /**
     * PlaylistManager constructor.
     * @param PlaylistGateway $playlistGateway
     */

    public function __construct(PlaylistGateway $playlistGateway)
    {
        $this->playlistGateway = $playlistGateway;
    }

    public function generateRandomPlaylist($rand)
    {
        $randPlaylist= $this->playlistGateway->fetchAllGateway();




        return $randPlaylist;
    }
}