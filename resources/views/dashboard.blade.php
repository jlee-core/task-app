<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('管理者画面') }}
        </h2>
    </x-slot>
    <div class="user-list">
        @foreach ($users as $user)
        <a
            href="{{ route('admin.search', ['user' => $user->id]) }}"
            class="user-card-link">
            <div class="user-card">

                <div class="user-info">

                    <span class="{{ $user->is_online ? 'status-online' : 'status-offline' }}">
                    </span>

                    <div>
                        <h3 class="user-name">
                            {{ $user->name }}
                        </h3>

                        <p class="user-email">
                            {{ $user->email }}
                        </p>
                    </div>
                </div>

                <div class="user-login">
                    <p class="login-label">
                        最終ログイン
                    </p>

                    <p class="login-time">
                        {{ optional($user->last_seen_at)->diffForHumans() }}
                    </p>
                </div>

            </div>
        </a>
        @endforeach
    </div>
</x-app-layout>