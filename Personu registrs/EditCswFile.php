<?php declare(strict_types=1);


class EditCswFile
{
    private string $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function readCsvAllAsArrays(): array
    {
        $fp = fopen($this->file, "r");
        $csvArray = [];

        while ($row = fgetcsv($fp)) {
            $csvArray[] = $row;
        }
        return $csvArray;
    }

    public function addNewPersonToCsv(array $newPerson):void
    {
        $file = fopen($this->file, "a");


        fputcsv($file, $newPerson);


        fclose($file);
    }
}

