<?php


namespace App\Manager\Export\Generator;


use App\Gateway\PlaylistGateway;
use App\Entity\PlaylistInterface;
use App\Manager\Export\Generator\AbstractExportGenerator;

class ExportGeneratorCsv extends AbstractExportGenerator
{

    public function doesHandle(Array $criteria):bool
    {
        if(($criteria["Format"] = "csv"))
        {
            return 1 ;
        }
        return 0;
    }

    public function generateFile(Array $criteria)
    {
        $formatData[] = $this->formatData();
        $fp = fopen('file.csv', 'w');

        foreach ($formatData as $fields)
        {
            fputcsv($fp, $fields);
        }

        fclose($fp);

    }



}