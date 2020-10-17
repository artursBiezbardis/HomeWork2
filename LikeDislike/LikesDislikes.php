<?php


class LikesDislikes
{
    public function setLike($arrayFromFile, $addLikeDislike)
    {
        $key = key($addLikeDislike);
        $array = $arrayFromFile;
        $newValue = $arrayFromFile["$key"]['likes'] +=
            $addLikeDislike[key($addLikeDislike)];
        $array["$key"]['likes'] = $newValue;
        return $array;
    }
}