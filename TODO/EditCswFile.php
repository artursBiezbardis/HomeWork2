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
        $fp = fopen("todo.csv", "r");
        $csvArray = [];

        while ($row = fgetcsv($fp)) {
            $csvArray[] = $row;
        }
        return $csvArray;
    }

    public function saveLineCsv(array $newTodo)
    {
        $file = fopen("todo.csv", "a");


        fputcsv($file, $newTodo);


        fclose($file);
    }

// atstaju paraugam
    public function overWriteCsv(array $array)
    {
        $file = fopen("todo.csv", "w");

        foreach ($array as $line) {
            fputcsv($file, $line);
        }

        fclose($file);
    }

    public function deleteToDo(array $allFromCsw, string $id): void
    {
        $newArray = [];
        foreach ($allFromCsw as $array) {
            if ($array[1] !== $id) {
                array_push($newArray, $array);
            }
        }

        $file = fopen("todo.csv", "w");

        foreach ($newArray as $line) {
            fputcsv($file, $line);
        }

        fclose($file);

    }
}
