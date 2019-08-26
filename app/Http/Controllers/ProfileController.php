<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
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

        return view('profile.index.profile', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profile.index.profile_edit', compact('user'));
    }

    public function update()
    {
        $data = request()->validate([
            'description' => 'required',
            'image' => 'file|image|max:5000',
        ]);

        if (request()->has('image')) {

            //dd(request('image'));

            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect('/profile/' . auth()->user()->id);
    }
}
