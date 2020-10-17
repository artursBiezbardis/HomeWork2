<?php


namespace App;



use Ramsey\Uuid\Generator\RandomBytesGenerator;

class RandomGenerator
{



    public function xGenerator( /*$minNum, $maxNum */)
    {
        $rg=new RandomBytesGenerator();

        return $rg->generate(10);

    }
}