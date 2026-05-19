<x-app-layout>
    <x-slot name="header">
        <h2>タスク一覧</h2>
    </x-slot>

    <ul class="task-list">
        @foreach ($tasks as $task)

        <li class="task-item">

            <p class="task-title">
                {{ $task->title }}
            </p>

            <p class="task-desc">
                {{ $task->description }}
            </p>

            <p class="task-meta">
                期限:
                {{ $task->due_date ? $task->due_date : '期限なし' }}
            </p>

            <p class="task-meta">
                ステータス:
                {{ $task->status->label() }}
            </p>

            <div class="task-actions">

                <a
                    href="{{ route('tasks.edit', $task) }}"
                    class="task-edit-btn"
                >
                    編集
                </a>

                <form
                    action="{{ route('tasks.destroy', $task) }}"
                    method="POST"
                    class="delete__button"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="task-delete-btn"
                        onclick="return confirm('本当に削除しますか？')"
                    >
                        削除
                    </button>

                </form>

            </div>

        </li>

        @endforeach
    </ul>
</x-app-layout>