<?php declare(strict_types=1);


class EditCsv
{
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function saveChat(array $newChat): void
    {
        $file = fopen($this->path, "a+");
        fputcsv($file, $newChat, ';');
        fclose($file);
    }
}