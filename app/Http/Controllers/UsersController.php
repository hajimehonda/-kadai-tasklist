<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加
use App\Task; // 追加

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }
    
     public function show($id)
    {
        $user = User::find($id);
        $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'tasks' => $tasks,
        ];

        $data += $this->counts($user);

        return view('users.show', $task);
    }
}
