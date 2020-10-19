<?php declare(strict_types=1);


class IdGenerator
{

    public static function generateUniqId($allFromCsw): string
    {
        $id = 0;
        $pattern = "/id:/";
        foreach ($allFromCsw as $array) {
            $idLastValue = (int)preg_replace($pattern, '', $array[1]);
            if ($idLastValue > $id) {
                $id = $idLastValue;
            }

        }
        return 'id:' . ((int)preg_replace($pattern, '', $id) + 1);
    }
}