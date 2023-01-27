<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Config\Database;
use App\Entity\Todo;
use App\Repository\TodolistRepository;

class RepositoryTest extends TestCase
{
    private \PDO $connection;
    public function setUp(): void
    {
        $this->connection = Database::getConnection();
    }
    /**
     * @testWith ["Satu"]
     * ["Dua"]
     * ["Tiga"]
     * ["Empat"]
     * ["Lima"]
     * 
     */
    public function testAdd(string $expected)
    {
        $todo = new Todo();
        $todo->setTodo($expected);
        $repo = new TodolistRepository($this->connection);;
        $repo->add($todo);
    }
}
