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


    public function create()
    {
         return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $task = $this->taskService->store(
            $request->user(),
            $request->validated()
        );

        return redirect()->route('tasks.index');
    }

    public function update() {}
    public function destroy() {}
}
