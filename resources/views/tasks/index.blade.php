<x-app-layout>
    <x-slot name="header">
        <h2>タスク一覧</h2>
    </x-slot>

    <ul class="task-list">
        @foreach ($tasks as $task)
        <li class="task-item">
            <p class="task-title">{{ $task->title }}</p>
            <p class="task-desc">{{ $task->description }}</p>

            <p class="task-meta">
                {{ $task->due_date ? $task->due_date : '期限なし' }}
            </p>

            <p class="task-meta">
                {{ $task->status->label() }}
            </p>
        </li>
        @endforeach
    </ul>
</x-app-layout>