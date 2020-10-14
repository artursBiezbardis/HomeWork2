<?php declare(strict_types=1);


class PinSearch
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function readCsvAllAsArrays(): array
    {
        $fp = fopen($this->path, "r");
        $csvArray = [];

        while ($row = fgetcsv($fp)) {
            $csvArray[] = $row;
        }
        return $csvArray;

    }

    public function searchPinInList(array $allFromSavedSessionReferencesCsw, string $pinEntry): array
    {
        $person = '';
        foreach ($allFromSavedSessionReferencesCsw as $sessionArray) {
            if ($sessionArray[0] == $pinEntry && !empty($allFromSavedSessionReferencesCsw)) {
                $person = $sessionArray;
            }
        }
        if (!empty($person)) {
            return $person;
        } else {
            return ['Pin kods nepareizs!'];
        }
    }
}