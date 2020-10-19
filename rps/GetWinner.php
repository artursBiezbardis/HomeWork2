<?php declare(strict_types=1);


class GetWinner
{

    private array $playObjects;

    function __construct( array $playObjects)
    {

        $this->playObjects = $playObjects;
    }


    public function whoWins(string $myPlayerChoice,string $computerPlayerChoice):string
    {
        foreach ($this->playObjects as $key=>$object)
        {
            if(lcfirst(get_class($object))==$myPlayerChoice){
                $myPlayerChoiceObj=$key;
            }
        }

        if (in_array($computerPlayerChoice,$this->playObjects[$myPlayerChoiceObj]->whoIsStronger()))
        {
            return 'Computer WIN!!!';
        }
        elseif (in_array($computerPlayerChoice,$this->playObjects[$myPlayerChoiceObj]->whoIsWeaker()))
        {
            return 'You WIN!!!';
        }else{

            return 'Game is TIE!!!';

        }
    }
}