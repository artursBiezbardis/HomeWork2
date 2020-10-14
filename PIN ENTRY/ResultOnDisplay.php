<?php declare(strict_types=1);


class ResultOnDisplay
{

    public function getResult(string $pinSearch,string $pinInput):string
    {
        if($pinSearch===$pinInput)
        {
            return 'UNLOCKED';
        }
        else
            {
            return 'Locked';
        }
    }
}