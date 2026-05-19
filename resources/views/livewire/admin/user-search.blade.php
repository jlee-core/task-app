<div class="search-container">

    {{-- 検索欄 --}}
    <input
        type="text"
        wire:model.live="keyword"
        placeholder="ユーザー名 or UUID"
        class="search-input">

    {{-- 候補一覧 --}}
    <div class="search-results">

        @foreach ($this->users as $user)

        <button
            wire:click="selectUser('{{ $user->id }}')"
            class="user-result-card">
            <p class="user-result-name">
                {{ $user->name }}
            </p>
        </button>

        @endforeach

    </div>

    {{-- task一覧 --}}
    @if($selectedUser)

    <div class="task-section">

        <h2>
            {{ $selectedUser->name }} のタスク一覧
        </h2>

        @forelse ($selectedUser->tasks as $task)

        <div class="task-card">

            <h3>
                {{ $task->title }}
            </h3>

            <p>
                {{ $task->description }}
            </p>

        </div>

        @empty

        <p>
            タスクがありません。
        </p>

        @endforelse

    </div>

    @endif

</div>