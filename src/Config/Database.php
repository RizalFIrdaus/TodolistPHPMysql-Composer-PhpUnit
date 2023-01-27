<?php

namespace App\Config;

use PDO;

class Database extends PDO
{
    public static function getConnection()
    {
        $host = "localhost";
        $port = "3306";
        $dbname = "todolistTest";
        $username = "root";
        $password = "";
        return new PDO("mysql:port=$host:$port;dbname=$dbname", $username, $password);
    }
}
