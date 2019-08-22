@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1><strong>PROFILE</strong></h1>
                    <a href="/profile/{{$user->id}}/edit">edit profile</a>
                </div>

                <div class="col-12">
                    <img src="{{ Auth::user()->profile->profileImage() }}" class="img-center-25" alt="">
                </div>

                <div class="text-center">
                    <h1>{{ Auth::user()->profile->description }}</h1>
                </div>
            </div>
        </div>

    </div>
    @endsection
