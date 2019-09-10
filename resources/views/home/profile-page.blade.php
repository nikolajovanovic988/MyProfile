@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-12 d-flex">

            <div class="col-8 shadow-sm bg-white">

                <div class="d-flex">
                    <img src="{{$user->profile->profileImage()}}" class="w-50" alt="">
                    <div>
                            <h2 class="p-0 m-0 pb-3 pl-1"> {{$user->name}}</h2>
                            <p class="p-0 m-0 pl-1"> <b>Contact:</b> </p>
                            <p class="p-0 m-0 pl-5"> <b>email:</b>  {{$user->email}} </p>
                            <p class="p-0 m-0 pl-5"> <b>phone:</b> {{$user->profilecontact->phone}} </p>
                            <p class="p-0 m-0 pl-5"> <b>linkedin:</b> {{$user->profilecontact->linkedin}} </p>
                            <p class="p-0 m-0 pl-5"> <b>facebook:</b> {{$user->profilecontact->facebook}} </p>
                            <p class="p-0 m-0 pl-5"> <b>skype:</b> {{$user->profilecontact->skype}} </p>
                            <p class="p-0 m-0 pl-5"> <b>github:</b> {{$user->profilecontact->github}} </p>
                    </div>
                </div>

                <div class="pt-2">
                    <p>{{$user->profile->description}}</p>
                </div>

            </div>

            <div class="col-4 shadow-sm bg-white">
                <h4>Education:</h4>
                @foreach ($user->profileeducations as $education)
                    <div class="pl-2 pt-2">
                        <p class="p-0 m-0">{{$education->school}}</p>
                        <p class="p-0 m-0">{{$education->degree}}</p>
                        <p class="p-0 m-0">from: {{$education->startyear}} to: {{$education->endyear}}</p>
                        <p class="p-0 m-0">{{$education->achieves}}</p>
                    </div>
                @endforeach
            </div>

        </div>

        <div class="col-12">

            <div class="col-12 shadow-sm bg-white mt-1">
                <div class="row">
                    @foreach ($user->profileprojects as $projects)
                    <div class="col-lg-12 pt-5 d-flex">
                        <video width="300" controls>
                            <source src="/storage/{{ $projects->video }}" type="video/mp4">
                            <source src="/storage/{{ $projects->video }}" type="video/ogg">
                            Your browser does not support HTML5 video.
                        </video>
                        <div class="pl-2 pt-4">
                            <p>description : {{$projects->description}}</p>
                            <p>idea : {{$projects->idea}}</p>
                            <p>Field : {{$projects->field}}</p>
                            <p>techonologie : {{$projects->techonologie}}</p>
                            <p>link : {{$projects->link}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>


        </div>

    </div>
@endsection
