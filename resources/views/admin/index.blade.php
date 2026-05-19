<h1>{{ $user->name }} のタスク一覧</h1>

@forelse ($tasks as $task)

    <div class="task-card">
        <h3>{{ $task->title }}</h3>

        <p>
            {{ $task->description }}
        </p>
    </div>

@empty

    <p>タスクがありません。</p>

@endforelse