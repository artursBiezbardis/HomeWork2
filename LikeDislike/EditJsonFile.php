<?php


class EditJsonFile
{
    private string $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function readArrayFromJson(): array
    {
        return json_decode(file_get_contents($this->path), true);
    }

    public function saveArrayInJson($newArray): void
    {
        file_put_contents($this->path, json_encode($newArray));
    }
}