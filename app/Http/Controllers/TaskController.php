<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Contracts\TaskServiceInterface;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{

    protected $taskService;

    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return response()->json($tasks, 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {

        $task = $this->taskService->createTask($request->all());
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = $this->taskService->getTaskById($id);
        if ($task) {
            return response()->json($task, 200);
        }
        return response()->json(['error' => 'Task not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, string $id)
    {
        $task = $this->taskService->updateTask($id, $request->all());
        if ($task) {
            return response()->json($task, 200);
        }
        return response()->json(['error' => 'Task not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($this->taskService->deleteTask($id)) {
            return response()->json(['message' => 'Task deleted'], 200);
        }
        return response()->json(['error' => 'Task not found'], 404);
    }
}
