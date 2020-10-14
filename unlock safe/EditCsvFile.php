<?php declare(strict_types=1);


class EditCsvFile
{
    private $path;


    function __construct(string $path)
    {

        $this->path = $path;

    }

    public function saveNumber(string $newNumber, string $savedNumbers): void
    {

        $file = fopen($this->path, 'w');
        fwrite($file, $savedNumbers . $newNumber);
        fclose($file);

    }

    public function getNumbers(): string
    {
        return file_get_contents($this->path);
    }

    public function emptyCsv(): void
    {
        file_put_contents($this->path, '');
    }
}