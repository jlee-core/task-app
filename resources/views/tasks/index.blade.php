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
        <div>
            <a href="{{ route('tasks.edit', $task) }}">編集</a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="delete__button">
                @method('DELETE')
                <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
            </form>
        </div>
        </li>
        @endforeach
    </ul>
</x-app-layout>