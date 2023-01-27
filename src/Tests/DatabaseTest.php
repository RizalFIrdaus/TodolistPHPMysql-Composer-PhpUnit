<?php

namespace App\Tests;

use App\Config\Database;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testDatabase()
    {
        $con = Database::getConnection();
        self::assertIsObject($con);
    }
}
