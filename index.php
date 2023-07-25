<?php

spl_autoload_register(function ($className) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    require_once $classPath . '.php';
});

use App\Controllers\UploadController;

// Roteamento simples para direcionar a ação correta com base no parâmetro "action"
$action = $_GET['action'] ?? 'showForm';
$controller = new UploadController();

if ($action === 'showForm') {
    $controller->showForm();
} elseif ($action === 'upload') {
    $controller->uploadFile();
}
