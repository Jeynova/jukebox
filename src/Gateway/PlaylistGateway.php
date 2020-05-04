<?php


namespace App\Gateway;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PlaylistRepository;

class PlaylistGateway
{
    /** @var EntityManagerInterface */
    protected $entityManager;

    /**
     * PlaylistGateway constructor.
     * @param PlaylistRepository $entityManager
     */
    public function __construct(PlaylistRepository $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function fetchAllGateway()
    {
        return $all = $this->entityManager->findAll();

    }
}