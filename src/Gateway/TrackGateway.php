<?php


namespace App\Gateway;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TrackRepository;

class TrackGateway
{  /**
    * @var EntityManagerInterface
    */
    protected $entityManager;

    /**
     * TrackGateway constructor.
     * @param TrackRepository $entityManager
     */
    public function __construct(TrackRepository $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function fetchAllGateway()
    {
        return $all = $this->entityManager->findAll();

    }
}