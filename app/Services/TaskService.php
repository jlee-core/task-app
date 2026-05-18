<?php

namespace App\Services;

use App\Models\Task;
use App\Models\User;

class TaskService
{
    public function index(User $user)
    {
        return $user->tasks()->latest()->get();
    }

    public function store(User $user, array $data): Task
    {
        return $user->tasks()->create($data);
    }

    public function update(Task $task, array $data): Task
    {
        $task->update($data);

        return $task->refresh();
    }

    public function destroy(Task $task): void
    {
        $task->delete();
    }
}
