<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminSearchController extends Controller
{
    public function index()
    {
        return view('admin.search');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $user = User::query()
            ->where('id', $keyword)
            ->orWhere('name', $keyword)
            ->first();

        if (! $user) {
            return back()->with('error', 'ユーザーが見つかりません。');
        }

        return redirect()->route('admin.users.tasks', $user);
    }
}
