<?php declare(strict_types=1);


class NumberStore implements StorageInterface
{
    protected int $number;
    protected string $filePath;


    public function __construct($numFromGen, $filePath = 'default.txt')
    {
        $this->number = $numFromGen;
        $this->filePath = $filePath;

    }

    public function save(): void
    {
        if (file_exists($this->filePath)) {
            file_put_contents($this->filePath,
                file_get_contents($this->filePath) . ' ' . $this->number);
        } else {
            file_put_contents($this->filePath, $this->number);
        }

    }

    public function readFile(): array
    {
        return explode(' ', trim(file_get_contents($this->filePath)));
    }
}