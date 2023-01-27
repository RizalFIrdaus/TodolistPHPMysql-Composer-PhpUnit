<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Config\Database;
use App\Entity\Todo;
use App\Repository\TodolistRepository;

class RepositoryTest extends TestCase
{
    private \PDO $connection;
    private Todo $todo;
    private TodolistRepository $repo;
    public function setUp(): void
    {
        $this->connection = Database::getConnection();
        $this->todo = new Todo();
        $this->repo = new TodolistRepository($this->connection);
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
        $this->markTestSkipped();
        $this->todo->setTodo($expected);
        $this->repo->add($this->todo);
    }

    /**
     *  Id found
     */
    public function testRemoveSuccess()
    {
        $this->markTestSkipped();
        self::assertTrue($this->repo->remove(2));
    }


    /**
     * Id not found
     */
    public function testRemoveError()
    {
        $this->markTestSkipped();
        self::assertTrue($this->repo->remove(100));
    }

    public function testGetAll()
    {
        foreach ($this->repo->getAll() as $data) {
            var_dump($data["id"] . " " . $data["todo"]);
        }
    }
}
