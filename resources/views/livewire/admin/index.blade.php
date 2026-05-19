<x-app-layout>
    
    @include('livewire.admin.partials.task-list', [
    'user' => $user,
    'tasks' => $tasks,
    ])

</x-app-layout>