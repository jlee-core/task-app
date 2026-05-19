<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TaskService;
use App\Http\Resources\TaskResource;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\UpdateTaskRequest;
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

    public function show(Task $task): TaskResource
    {
        return new TaskResource($task);
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

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return response()->json([
            'message' => 'updated',
            'data' => $task
        ]);
    }

    public function destroy(Task $task) {
        $task->delete();
        return response()->json([
            'message' => 'Item deleted successfully'
        ], 204);
    }
}
