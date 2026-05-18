<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TaskService;
use App\Http\Resources\TaskResource;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(
        protected TaskService $taskService
    ) {}

    public function index(Request $request)
    {
        $tasks = $this->taskService->index(
            $request->user()
        );

        return TaskResource::collection($tasks);
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
}
