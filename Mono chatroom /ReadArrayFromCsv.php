<?php declare(strict_types=1);


class ReadArrayFromCsv
{
    static function getArrayFromCsv(string $path,string $delimiter): array
    {
        $fp = fopen($path, "r");
        $userArray = [];

        while ($row = fgetcsv($fp, 0, $delimiter)) {
            $userArray[] = $row;
        }
        fclose($fp);
        return $userArray;

    }
}