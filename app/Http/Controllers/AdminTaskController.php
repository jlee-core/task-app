<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminTaskController extends Controller
{
    public function index(User $user)
    {
        $tasks = $user->tasks()
            ->latest()
            ->get();

        return view('admin.index', compact('user', 'tasks'));
    }
}
