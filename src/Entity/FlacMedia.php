<?php


namespace App\Entity;


use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Entity;

/** @Entity */
class FlacMedia extends AbstractMedia
{
    protected $tracks;
    protected $id;

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
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param $file
     */
    public function setFile($file): void
    {
        $this->file = $file;
    }
}