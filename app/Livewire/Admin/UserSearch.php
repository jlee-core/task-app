<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserSearch extends Component
{
    public string $keyword = '';

    public ?User $selectedUser = null;

    public bool $showResults = false;

    public function mount(): void
    {
        $userId = request()->query('user');

        if ($userId) {
            $this->selectedUser = User::with('tasks')
                ->find($userId);
        }
    }
    
    public function updatedKeyword(): void
    {
        $this->showResults = true;
    }

    public function selectUser(string $userId): void
    {
        $this->selectedUser = User::with('tasks')
            ->findOrFail($userId);

        $this->keyword = '';

        $this->showResults = false;
    }

    public function getUsersProperty()
    {
        if ($this->keyword === '') {
            return collect();
        }

        return User::query()
            ->where('name', 'like', "%{$this->keyword}%")
            ->latest()
            ->limit(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.user-search');
    }
}
