<?php

namespace App\Service;

use App\Repository\TodolistRepository;
use App\Entity\Todo;

interface Service
{
    public function showGetAll(): void;
    public function showAdd(string $todo): void;
    public function showRemove(int $id): void;
}

class TodolistService implements Service
{

    public function __construct(private TodolistRepository $todolistRepository)
    {
    }

    public function showGetAll(): void
    {
        echo "===========" . PHP_EOL;
        foreach ($this->todolistRepository->getAll() as $value) {
            echo  "{$value->getId()}. " . $value->getTodo() . PHP_EOL;
        }
        echo "===========" . PHP_EOL;
    }

    public function showAdd(string $todo): void
    {
        $todolist = new Todo();
        $todolist->setTodo($todo);
        $this->todolistRepository->add($todolist);
        echo "Berhasil menambahkan todo" . PHP_EOL;
    }
    public function showRemove(int $id): void
    {
        $remove = $this->todolistRepository->remove($id);
        if ($remove) {
            echo "Berhasil menghapus" . PHP_EOL;
        } else {
            echo "Gagal menghapus" . PHP_EOL;
        }
    }
}
