<?php


class GetFromAPI
{
    private $apiAddress;

    function __construct($apiAddress)
    {

        $this->apiAddress = $apiAddress;
    }

    public function getResponse(array $requestValue)
    {
        if ($requestValue['name'] !== '') {
            $formattedRequest = key($requestValue) . '=' . $requestValue[key($requestValue)];
            $response = json_decode(file_get_contents($this->apiAddress . $formattedRequest), true);
            $responseString = '';
            foreach (array_keys($response) as $key) {
                $responseString .= $key . ': ' . $response[$key] . ', ';
            }
            return substr_replace(trim($responseString), '', -1, 1);
        }else{
            return '';
        }
    }
}