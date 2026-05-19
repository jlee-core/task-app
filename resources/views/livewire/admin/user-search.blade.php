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

    @include('livewire.admin.partials.task-list', [
    'user' => $selectedUser,
    'tasks' => $selectedUser->tasks,
    ])

    @endif

</div>