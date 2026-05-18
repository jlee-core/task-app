<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Models\Task;

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


    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $this->taskService->store(
            $request->user(),
            $request->validated()
        );

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
         return view('tasks.edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request, Task $task) {
        $task->update($request->validated());
        return redirect()->route('tasks.index');
    }
    
    public function destroy() {}
}
