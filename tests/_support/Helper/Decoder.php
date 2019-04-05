<?php

namespace Helper;
use Codeception\Module;

class Decoder extends Module
{
    public static function undecode($crypted = "")
    {
        //  base64_encode(gzcompress("12/12"));
        return gzuncompress(base64_decode($crypted));
    }

    public static function decode($crypted = "")
    {
        return  base64_encode(gzcompress($crypted));
        //return gzuncompress(base64_decode($crypted));
    }
}