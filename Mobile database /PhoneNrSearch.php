<?php declare(strict_types=1);


class PhoneNrSearch
{

    static function searchPersonByPhone(array $allFromCsw, string $phoneNumber): string
    {
        $person = '';
        foreach ($allFromCsw as $personArray) {
            if ($personArray[2] == $phoneNumber && !empty($allFromCsw)) {
                $person = $personArray;
            }
        }
        if (!empty($person)) {
            return $person[0] . ' ' . $person[1];
        } else {
            return 'Telefona numurs netika atrasts';
        }
    }
}