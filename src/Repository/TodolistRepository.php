<?php

namespace App\Repository;

interface TodolistRepository
{
    public function add(Todo $todo);
}


class TodolistRepositoryImp implements TodolistRepository
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
    public function add(Todo $todo)
    {
        $sql = "INSERT INTO todo (todo) VALUES (?)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$todo->getTodo()]);
    }
}
