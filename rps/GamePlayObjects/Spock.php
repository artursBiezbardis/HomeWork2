<?php


class Spock implements PlayObjectsInterface
{

    private array $weaker;
    private array $stronger;
    private string $picturePath;

    function __construct(array $weaker,array $stronger,string $picturePath){


        $this->weaker = $weaker;
        $this->stronger = $stronger;
        $this->picturePath = $picturePath;
    }

    public function getName(): string
    {
        return lcfirst(get_class());
    }

    public function whoIsStronger():array
    {
        return $this->stronger;
    }

    public function whoIsWeaker():array
    {
        return $this->weaker;
    }

    /**
     * @return string
     */
    public function getPicturePath(): string
    {
        return $this->picturePath;
    }
}