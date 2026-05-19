<div class="task-section">

    <h1 class="page-title">
        {{ $user->name }} のタスク一覧
    </h1>

    <div class="task-list">

        @forelse ($tasks as $task)

        <div class="task-card">

            <h3>
                {{ $task->title }}
            </h3>

            <p>
                {{ $task->description }}
            </p>

        </div>

        @empty

        <p class="empty-message">
            タスクがありません。
        </p>

        @endforelse

    </div>

</div>