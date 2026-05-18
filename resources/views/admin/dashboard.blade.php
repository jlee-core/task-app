<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('管理者画面') }}
        </h2>
    </x-slot>
    <div>
        @foreach ($users as $user)
        <h3>{{ $user->name }}</h3>
        @if($user->)
        @endforeach
    </div>
</x-app-layout>