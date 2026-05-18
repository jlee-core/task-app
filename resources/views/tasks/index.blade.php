<h2>Task一覧</h2>

<ul>
    @foreach ($tasks as $task)
        <li>
            <p>{{ $task->title }}</p>
            <p>{{ $task->description }}</p>
        </li>
    @endforeach
</ul>