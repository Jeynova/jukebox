<?php

namespace App\Manager\Export;

use App\Manager\Export\Generator\ExportGeneratorInterface;
use App\Entity\MediaInterface;
use App\Entity\PlaylistInterface;


class ExportManager
{
    protected $exportGenerator = [];

    public function __construct(ExportGeneratorInterface ...$exportGenerator)
    {
        foreach ($exportGenerator as $generator)
        {
            $this->exportGenerator[] = $generator;
    }

    }

    public function exportFile(Array $criteria)
    {

        foreach ($this->exportGenerator as $item)
        {
            if($item->doesHandle($criteria))
            {
                $item->generateFile($criteria);
            }
        }
    }

}