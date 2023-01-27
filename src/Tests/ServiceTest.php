<?php

namespace App\Tests;

use App\Config\Database;
use App\Service\TodolistService;
use App\Repository\TodolistRepository;
use App\Entity\Todo;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    private \PDO $connection;
    private Todo $todo;
    private TodolistRepository $repo;
    private TodolistService $service;
    public function setUp(): void
    {
        $this->connection = Database::getConnection();
        $this->todo = new Todo();
        $this->repo = new TodolistRepository($this->connection);
        $this->service = new TodolistService($this->repo);
    }

    public function testShowGetAll()
    {
        var_dump($this->service->showGetAll());
    }
}
