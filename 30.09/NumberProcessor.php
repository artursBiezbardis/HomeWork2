<?php declare(strict_types=1);


class NumberProcessor
{
    public StorageInterface $numFromStore;
    public array $fileNumbers;
    protected int $randomNum;

    public function __construct(StorageInterface $numFromStore, $randomNum)
    {
        $this->numFromStore = $numFromStore;
        $this->fileNumbers = $numFromStore->readFile();
        $this->randomNum = $randomNum;
    }

    public function averageNumFromFile(): float
    {
        if ($this->fileNumbers) {
            return round(array_sum($this->fileNumbers) / count($this->fileNumbers), 2);
        } else {
            return $this->randomNum;
        }

    }
}