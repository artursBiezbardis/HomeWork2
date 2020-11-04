<?php declare(strict_types=1);


class CheckEndReturnFromArray
{


    public function checkValueOfArray(array $arrayOfUsers, string $checkWhatFor): string
    {
        $person = '';
        foreach ($arrayOfUsers as $user) {
            if (!empty($arrayOfUsers) && $user[1] == $checkWhatFor) {
                $person = $user[0];

            }

        }
        return $person;


    }

    public function getName(array $arrayOfUsers, string $checkWhatFor): string
    {
        $person = '';
        foreach ($arrayOfUsers as $user) {
            if (!empty($arrayOfUsers) && $user[0] == $checkWhatFor) {
                $person = $user[2];

            }

        }
        return $person;


    }
}