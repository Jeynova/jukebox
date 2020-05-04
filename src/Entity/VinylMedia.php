<?php


namespace App\Entity;


use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Entity;

/** @Entity */
class VinylMedia extends  AbstractMedia
{

    protected $id;
    protected $location;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location): void
    {
        $this->location = $location;
    }
}