<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('home.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('home.profile-page', compact('user'));
    }
}
