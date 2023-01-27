<?php

namespace App\Entity;

class Todo
{
    public function __construct(private string $todo, private int $id)
    {
    }
    public function getTodo(): string
    {
        return $this->todo;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setTodo(string $todo): void
    {
        $this->todo = $todo;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
