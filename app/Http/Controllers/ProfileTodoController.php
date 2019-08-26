<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ProfileTodo;

class ProfileTodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user)
    {
        $user = auth()->user();
        return view('profile.todo.todo', compact('user'));
    }

    public function store(User $user, $todo)
    {
        $data = [
            'task' => $todo,
            'completed' => false
        ];

        $user->profiletodos()->create($data);
    }

    public function delete(User $user, ProfileTodo $todo)
    {
        $user->profiletodos()->find($todo->id)->delete();
    }

    public function get(User $user)
    {
        return $user->profiletodos;
    }

    public function edit(User $user, ProfileTodo $todo, $value)
    {
        $user->profiletodos()->find($todo->id)->update(['completed' => $value]);
    }
}
