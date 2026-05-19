<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $users = [];
        $tasks = [];

        if ($user->is_admin) {
            $users = User::latest()->get();
            $tasks = Task::latest()->get();
        }

        return view('dashboard', compact('users', 'tasks'));
    }
}
