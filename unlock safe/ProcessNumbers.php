<?php declare(strict_types=1);


class ProcessNumbers
{
    private $path;

    function __construct(string $path)
    {

        $this->path = $path;
    }




    public function convertNumsToX():string
    {
        if (strlen(file_get_contents($this->path)) <= 4) {
            $xOutput = '';
            for ($i = 0; $i < strlen(file_get_contents($this->path)); $i++) {
                $xOutput .= '*';
            }
            return $xOutput;
        } else {
            return 'Something wen\'t wrong in convert Nums to X ';
        }

    }

}

