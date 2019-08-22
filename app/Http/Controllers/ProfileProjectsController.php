<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ProfileProject;

class ProfileProjectsController extends Controller
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
        return view('profile.projects.projects', compact('user'));
    }

    public function create(User $user)
    {
        return view('profile.projects.project_create', compact('user'));
    }

    public function store()
    {

        $data = request()->validate([
            'description' => '',
            'idea' => '',
            'techonologie' => '',
            'link' => 'url',
            'video' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
        ]);

        if (request('video')) {
            $videoPath = request('video')->store('videos', 'public');
            $videoArray = ['video' => $videoPath];
        };

        Auth()->user()->profileprojects()->create(array_merge(
            $data,
            $videoArray ?? []
        ));


        return redirect('/profile/' . auth()->user()->id . '/projects');
    }

    public function destroy(User $user, ProfileProject $project)
    {
        Auth()->user()->profileprojects()->find($project->id)->delete();

        return redirect('/profile/' . auth()->user()->id . '/projects');
    }


    public function edit(User $user, ProfileProject $project)
    {
        return view('profile.projects.project_edit', compact('user','project'));
    }


    public function update(User $user, ProfileProject $project)
    {
        $data = request()->validate([
            'description' => '',
            'idea' => '',
            'techonologie' => '',
            'link' => 'url',
            'video' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
        ]);

        if (request('video')) {
            $videoPath = request('video')->store('videos', 'public');
            $videoArray = ['video' => $videoPath];
        };

        Auth()->user()->profileprojects()->find($project->id)->update(array_merge(
            $data,
            $videoArray ?? []
        ));

        return redirect('/profile/' . auth()->user()->id . '/projects');
    }

}
