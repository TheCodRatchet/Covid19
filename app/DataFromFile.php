<?php

namespace App;

use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\TabularDataReader;

class DataFromFile
{
    private Reader $csv;

    public function __construct(string $filename)
    {
        $this->csv = Reader::createFromPath($filename, "r");
        $this->csv->setHeaderOffset(0);
        $this->csv->setDelimiter(";");
    }

    public function getRecords(): TabularDataReader
    {
        return Statement::create()->process($this->csv);
    }
}