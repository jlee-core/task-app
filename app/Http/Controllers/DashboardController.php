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

        if ($user->is_admin) {
            $users = User::latest()->get();
            $tasks = Task::latest()->get();

            return view('admin.dashboard', compact('users', 'tasks'));
        }

        return view('dashboard');
    }
}
