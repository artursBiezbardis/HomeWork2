<?php


class ProcessingCSV
{

    private $file;

    function __construct($file){

        $this->file = $file;
    }

    public function saveInFile($dataStringApi)
    {
        if (filesize($this->file) > 0) {
            $file = fopen($this->file, 'a+');
            fwrite($file, "\n" . $dataStringApi.';');
            fclose($file);
        } else {
            $file = fopen($this->file, 'a+');
            fwrite($file, $dataStringApi.';');
            fclose($file);
        }
    }

    public function searchAndGetNameCSV( string $name): string
    {
        if (file_exists($this->file) && (filesize($this->file) > 0))
        {
            $arrayList = explode(';', trim(file_get_contents($this->file)));
            foreach ($arrayList as $string)
            {
                if (strpos($string, $name))
                {
                    return substr_replace($string,' ',-1,1);
                }
            }
            return '';

        } else {
            return '';
        }
    }
}