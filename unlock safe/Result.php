<?php declare(strict_types=1);


class Result
{
    private $pin;

    function __construct(string $pin)
    {
        $this->pin = $pin;
    }

    public function getResult(string $pinInput):string
    {
        if($this->pin===$pinInput)
        {
            return 'UNLOCKED';
        }
        else
            {
            return 'Locked';
        }
    }
}