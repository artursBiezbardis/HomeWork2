<?php declare(strict_types=1);


interface PlayObjectsInterface
{


    public function getName():string;
    public function whoIsWeaker():array;
    public function whoIsStronger():array;
}