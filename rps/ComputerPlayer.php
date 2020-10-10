<?php declare(strict_types=1);


class ComputerPlayer
{
    protected array $playObjects;

    function __construct(array $playObjects)
    {
        $this->playObjects = $playObjects;
    }

    public function computerChoice():int
    {

        return array_rand($this->playObjects);
    }

}