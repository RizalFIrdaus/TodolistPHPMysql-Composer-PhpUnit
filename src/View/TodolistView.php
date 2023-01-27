<?php

namespace App\View;

use App\Service\TodolistService;

class TodolistView
{
    public function __construct(private TodolistService $todolistService)
    {
    }

    public function showTodolist(): void
    {
        while (true) {
            $this->todolistService->showGetAll();
            echo "Menu" . PHP_EOL;
            echo "1. Tambah Todolist" . PHP_EOL;
            echo "2. Hapus Todolist" . PHP_EOL;
            echo "x. Keluar" . PHP_EOL;
        }
    }
}
