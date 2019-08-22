<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilePhonebookController extends Controller
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
        return view('profile.phonebook.phonebook', compact('user'));
    }


}
