<?php


namespace App\Manager\Export\Generator;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportGeneratorXls extends AbstractExportGenerator
{
    public function doesHandle(Array $criteria):bool
    {
        if(!empty($criteria["xls"]))
        {
            return 1 ;
        }
        return 0;
    }

    public function generateFile(Array $criteria)
    {
        $spreadsheet = new spreadsheet();

    }
}