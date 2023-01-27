<?php

namespace App\Helper;


class Input
{
    public static function get(string $info): string
    {
        echo "$info";
        $res = fgets(STDIN);
        return trim($res);
    }
}
