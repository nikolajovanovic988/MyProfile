@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1><strong>PROJECTS</strong></h1>
                    <a href="/profile/{{ Auth::user()->id }}/projects/create">add project</a>
                </div>

                <div class="col-12">
                    <img src="{{ Auth::user()->profile->profileImage() }}" class="img-center-25" alt="">
                </div>

                <div class="text-center">
                    <h1>To enter my profile mail: nikola@mail.com , pass: 123456789</h1>
                </div>
            </div>
            <div class="row">
                @foreach (Auth::user()->profileprojects as $projects)
                    <div class="col-lg-6 pt-5">

                        <p>description : {{$projects->description}}</p>
                        <p>idea : {{$projects->idea}}</p>
                        <p>Field : {{$projects->field}}</p>
                        <p>techonologie : {{$projects->techonologie}}</p>
                        <p>link : {{$projects->link}}</p>

                        <video width="300" controls>
                            <source src="/storage/{{ $projects->video }}" type="video/mp4">
                            <source src="/storage/{{ $projects->video }}" type="video/ogg">
                            Your browser does not support HTML5 video.
                        </video>

                        <div class="row">
                            <form action="/profile/{{ Auth::user()->id }}/projects/delete/{{$projects->id}}"
                                enctype="multipart/form-data"
                                class="col-3"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row pt-3">
                                        <button class="btn btn-primary">Delete</button></button>
                                </div>

                            </form>

                            <form action="/profile/{{ Auth::user()->id }}/projects/edit/{{$projects->id}}" class="col-3">

                                <div class="row pt-3">
                                        <button class="btn btn-primary">EDIT</button></button>
                                </div>

                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

    </div>
    @endsection
