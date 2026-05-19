<x-app-layout>
    <form
        action="{{ route('admin.search.submit') }}"
        method="POST">
        @csrf

        <input
            type="text"
            name="keyword"
            placeholder="ユーザー名 or UUID">

        <button type="submit">
            検索
        </button>

    </form>

    @if(session('error'))
    <p>{{ session('error') }}</p>
    @endif
</x-app-layout>