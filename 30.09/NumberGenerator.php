<?php declare(strict_types=1);


class NumberGenerator
{

    public int $minNum;
    public int $maxNum;

    public function __construct(int $minNum = 1, int $maxNum = 1000)
    {

        $this->minNum = $minNum;
        $this->maxNum = $maxNum;

    }

    public function generateNum()
    {
        return rand($this->minNum, $this->maxNum);
    }
}