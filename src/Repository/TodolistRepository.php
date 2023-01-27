<?php

namespace App\Repository;

use App\Entity\Todo;
use PDOException;

interface TodolistRepositoryInterface
{
    public function add(Todo $todo): void;
}


class TodolistRepository implements TodolistRepositoryInterface
{

    /**
     * Connection database
     * Return \PDO
     */
    public function __construct(private \PDO $connection)
    {
    }

    /**
     * Menambahkan todo kedalam database
     */
    public function add(Todo $todo): void
    {
        $sql = "INSERT INTO todo (todo) VALUES (?)";
        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute([$todo->getTodo()]);
            echo "Success Added Todo" . PHP_EOL;
        } catch (PDOException $exception) {
            echo "Error : {$exception->getMessage()}";
        }
    }
}
