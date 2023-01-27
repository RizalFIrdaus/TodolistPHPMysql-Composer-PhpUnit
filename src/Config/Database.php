<?php

namespace App\Config;

use Exception;
use PDO;

class Database extends PDO
{
    public static function getConnection(): \PDO
    {
        $host = "localhost";
        $port = "3306";
        $dbname = "todolistTest";
        $username = "root";
        $password = "";
        $con = new PDO("mysql:port=$host:$port;dbname=$dbname", $username, $password);
        if ($con != null) {
            return $con;
        } else {
            throw new Exception("Gagal Terhubung dengan database");
        }
    }
}
