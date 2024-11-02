<?php

namespace App\Services;

use App\Contracts\TaskServiceInterface;
use App\Models\Task;

class TaskService implements TaskServiceInterface
{
    public function getAllTasks()
    {
        return Task::all();
    }

    public function createTask(array $data)
    {
        return Task::create($data);
    }

    public function getTaskById(string $id)
    {
        return Task::find($id);
    }

    public function updateTask(string $id, array $data)
    {
        $task = $this->getTaskById($id);
        if ($task) {
            $task->update($data);
            return $task;
        }
        return null;
    }

    public function deleteTask(string $id)
    {
        if ($task = $this->getTaskById($id)) {
            return $task->delete();
        }
        return false;
    }
}
