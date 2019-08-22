<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileContactController extends Controller
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
        return view('profile.contact.contact', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profile.contact.contact_edit', compact('user'));
    }

    public function update()
    {
        $data = request()->validate([
            'facebook' => 'url',
            'linkedin' => 'url',
            'skype' => '',
            'phone' => '',
            'github' => 'url',
        ]);


        Auth()->user()->profilecontact->update($data);

        return redirect('/profile/' . auth()->user()->id . '/contact');
    }
}
