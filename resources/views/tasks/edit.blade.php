<x-app-layout>
    <form method="POST" action="{{ route('tasks.update', $task) }}" class="task-form">
        @csrf
        @method('PUT')

        <!-- タイトル -->
        <div class="form-group">
            <label for="title">タイトル</label>
            <input id="title" type="text" name="title"
                   value="{{ old('title', $task->title) }}" class="input">

            @error('title')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <!-- 内容 -->
        <div class="form-group">
            <label for="description">内容</label>
            <textarea id="description" name="description" class="textarea">{{ old('description', $task->description) }}</textarea>

            @error('description')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <!-- 期限 -->
        <div class="form-group">
            <label for="due_date">期限</label>
            <input id="due_date" type="datetime_local" name="due_date"
                   value="{{ old('due_date', optional($task->due_date)->format('Y-m-d\TH:i')) }}" class="input">
        </div>

        <!-- 進捗 -->
        <div class="form-group">
            <label for="status">進捗</label>
            <select id="status" name="status" class="input">
                @foreach (\App\Enums\TaskStatus::cases() as $status)
                    <option value="{{ $status->value }}"
                        {{ old('status', $task->status?->value) === $status->value ? 'selected' : '' }}>
                        {{ $status->label() }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn">更新</button>
    </form>
</x-app-layout>