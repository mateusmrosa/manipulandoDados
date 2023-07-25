<?php

namespace App\Controllers;

use App\Models\Database;

class UploadController
{
    public function showForm()
    {
        include_once './App/Views/upload.php';
    }

    public function uploadFile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['arquivo'])) {
            $file = $_FILES['arquivo'];

            if ($file['error'] !== UPLOAD_ERR_OK) {
                echo "Erro no upload do arquivo.";
                exit;
            }

            $uploadDir = $this->generateUploadDir();

            $fileName = $this->generateFileName($file['name']);

            if (move_uploaded_file($file['tmp_name'], $uploadDir . $fileName)) {

                $csvData = array_map('str_getcsv', file($uploadDir . $fileName));
                $header = array_shift($csvData);

                $header = $this->sanitizeHeader($header);

                $db = new Database();

                foreach ($csvData as $row) {
                    $rowData = array_combine($header, $row);
                    $success = $db->insertData("organizations", $rowData);
                }

                if ($success) {
                    echo "Dados inseridos registrados com sucesso!";
                } else {
                    echo "Erro";
                }
            } else {
                echo "Erro ao mover o arquivo.";
            }
        }
    }

    private function sanitizeHeader($header)
    {
        return array_map(function ($column) {
            return $column === 'Index' ? 'id' : str_replace(' ', '_', $column);
        }, $header);
    }

    private function generateUploadDir()
    {
        return 'App/uploads/';
    }

    private function generateFileName($originalName)
    {
        return uniqid() . '_' . $originalName;
    }
}
