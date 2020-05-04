<?php


namespace App\Manager\Export\Generator;


use App\Entity\PlaylistInterface;

Interface ExportGeneratorInterface
{

    public function doesHandle(Array $criteria):bool;

    public function generateFile(Array $criteria);
    
}