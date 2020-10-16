<?php


class homeMadeTools
{
    public static function homeMadeHash($unhashed) { // meme crypto is the way to go
        $hashed = "";

        $tmpUnhashed = str_split($unhashed);
        foreach ($tmpUnhashed as $char){

            $hahsed .= chr((ord($char) + 1));;

        }

        return $hashed;
    }

}