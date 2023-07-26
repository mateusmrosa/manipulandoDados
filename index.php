<?php

spl_autoload_register(function ($className) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    require_once $classPath . '.php';
});

use App\Controllers\UploadController;

$action = $_GET['action'] ?? 'showForm';

$controller = new UploadController();

if ($action === 'showForm')
    $controller->showForm();
elseif ($action === 'relatorio1')
    $controller->relatorio1();
elseif ($action === 'relatorio2')
    $controller->relatorio2();
elseif ($action === 'relatorio3')
    $controller->relatorio3();
elseif ($action === 'upload')
    $controller->uploadFile();
