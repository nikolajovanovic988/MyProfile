<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\ProfileEducation;

class ProfileEducationController extends Controller
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
        return view('profile.education.education', compact('user'));
    }

    public function create(User $user)
    {
        return view('profile.education.education_create', compact('user'));
    }

    public function store()
    {
        $data = request()->validate([
            'school' => '',
            'degree' => '',
            'field' => '',
            'startyear' => '',
            'endyear' => '',
            'achieves' => '',
        ]);

        Auth()->user()->profileeducations()->create($data);


        return redirect('/profile/' . auth()->user()->id . '/education');
    }

    public function destroy(User $user, ProfileEducation $education)
    {
        Auth()->user()->profileeducations()->find($education->id)->delete();

        return redirect('/profile/' . auth()->user()->id . '/education');
    }

    public function edit(User $user, ProfileEducation $education)
    {
        return view('profile.education.education_edit', compact('user','education'));
    }

    public function update(User $user, ProfileEducation $education)
    {
        $data = request()->validate([
            'school' => '',
            'degree' => '',
            'field' => '',
            'startyear' => '',
            'endyear' => '',
            'achieves' => '',
        ]);

        Auth()->user()->profileeducations()->find($education->id)->update($data);

        return redirect('/profile/' . auth()->user()->id . '/education');
    }
}
