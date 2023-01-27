<?php

namespace App;

use App\Repository\TodolistRepository;
use App\Config\Database;
use App\Service\TodolistService;
use App\View\TodolistView;

class App
{
    public function __construct()
    {
        $connection = Database::getConnection();
        $repository = new TodolistRepository($connection);
        $service = new TodolistService($repository);
        $view = new TodolistView($service);
        $view->showTodolist();
    }
}
