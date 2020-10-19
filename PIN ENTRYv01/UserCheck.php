<?php declare(strict_types=1);


class UserCheck
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function createArrayOfUsers(): array
    {
        $fp = fopen($this->path, "r");
        $userArray = [];

        while ($row = fgetcsv($fp, 0, ';')) {
            $userArray[] = $row;
        }
        return $userArray;

    }

    public function checkUserByPin(array $arrayOfUsers, string $pinEntry): array
    {
        $person = [];
        foreach ($arrayOfUsers as $user) {
            if (!empty($arrayOfUsers) && $user[1] == $pinEntry) {
                $person = $user;
                unset($_POST['pin']);
            }

        }

        return $person;


    }
}