<?php

namespace App\View;

use App\Service\TodolistService;
use App\Helper\Input;

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
            $input = Input::get("Masukan Nomor Pilihan : ");
            if ($input == "1") {
                $this->addTodolist();
            } else if ($input == "2") {
                $this->removeTodolist();
            } else if ($input = "x") {
                break;
            } else {
                echo "Pilihanmu salah!" . PHP_EOL;
            }
        }
        echo "Terima Kasih, sampai jumpa !" . PHP_EOL;
    }
    public function addTodolist(): void
    {
        echo "Tambah Todolist" . PHP_EOL;
        echo "===========" . PHP_EOL;
        $input = Input::get("Masukan todolist kamu : ");
        $this->todolistService->showAdd($input);
    }
    public function removeTodolist(): void
    {
        echo "Hapus Todolist" . PHP_EOL;
        echo "===========" . PHP_EOL;
        $input = Input::get("Masukan nomor todolist yang dihapus : ");
        $this->todolistService->showRemove($input);
    }
}
