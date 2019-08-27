<?php

namespace App\Http\Controllers;

use App\ProfilePhonebook;
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

    public function store(User $user, Request $request)
    {
        $data = [
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email
        ];

        $user->profilephonebook()->create($data);

    }

    public function get(User $user)
    {
        return $user->profilephonebook()->orderBy('name', 'DESC')->get();
    }

    public function delete(User $user, ProfilePhonebook $phonebook)
    {
        $user->profilephonebook()->find($phonebook->id)->delete();
    }

    public function update(User $user, Request $request)
    {
        $data = [
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email
        ];

        $user->profilephonebook()->find($request->id)->update($data);
    }


}
