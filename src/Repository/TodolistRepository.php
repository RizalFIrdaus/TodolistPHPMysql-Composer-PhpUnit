<?php

namespace App\Repository;

use App\Entity\Todo;
use PDOException;

interface TodolistRepositoryInterface
{
    public function add(Todo $todo): void;
    public function remove(int $id): bool;
    public function getAll(): array;
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

    /**
     * Method menghapus todo dari database 
     * Return Bool
     */
    public function remove(int $id): bool
    {
        $sql = "SELECT id FROM todo WHERE id=?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);
        if ($statement->fetch()) {
            $sql = "DELETE FROM todo WHERE id=?";
            $st = $this->connection->prepare($sql);
            $st->execute([$id]);
            return true;
        } else {
            // Select id tidak ada
            return false;
        }
    }

    public function getAll(): array
    {
        $todolist = array();
        $sql = "SELECT id,todo FROM todo";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        foreach ($statement as $key => $value) {
            $todolist[$key] = $value;
        }
        return $todolist;
    }
}
