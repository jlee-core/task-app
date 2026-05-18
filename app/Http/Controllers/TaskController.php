<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use Illuminate\Http\Request;
use App\Services\TaskService;

class TaskController extends Controller
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request)
    {
        $tasks = $this->taskService->index(
            $request->user()
        );

        return view('tasks.index', compact('tasks'));
    }

    public function store(StoreTaskRequest $request)
    {
        $task = $this->taskService->store(
            $request->user(),
            $request->validated()
        );

        return response()->json([
            'task' => $task,
        ]);
    }

    public function update() {}
    public function destroy() {}
}
