<?php declare(strict_types=1);


class IdSearch
{

    static function searchPersonByID(array $allFromCsw, string $idNum): string
    {
        $person = '';
        foreach ($allFromCsw as $personArray) {
            if ($personArray[2] == $idNum && !empty($allFromCsw)) {
                $person = $personArray;
            }
        }
        if (!empty($person)) {
            return $person[0] . ' ' . $person[1] . ', ' . $person[2] . ', ' . $person[3];
        } else {
            return 'Persona netika atrasta!';
        }
    }
}