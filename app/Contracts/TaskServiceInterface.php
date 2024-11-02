<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface TaskServiceInterface
{
    public function getAllTasks();
    public function createTask(array $data);
    public function getTaskById(string $id);
    public function updateTask(string $id, array $data);
    public function deleteTask(string $id);
}
