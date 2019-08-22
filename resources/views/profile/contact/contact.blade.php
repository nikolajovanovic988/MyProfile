@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1><strong>CONTACT</strong></h1>
                    <a href="/profile/{{ Auth::user()->id }}/contact/edit">edit contact</a>
                </div>

                <div class="col-12">
                    <img src="{{ Auth::user()->profile->profileImage() }}" class="img-center-25" alt="">
                </div>

                <div class="text-left">
                    <h1><strong>Facebook </strong> : {{ Auth::user()->profilecontact->facebook }}</h1>
                    <h1><strong>Linkedin </strong> : {{ Auth::user()->profilecontact->linkedin }}</h1>
                    <h1><strong>Skype </strong> : {{ Auth::user()->profilecontact->skype }}</h1>
                    <h1><strong>Phone </strong> : {{ Auth::user()->profilecontact->phone }}</h1>
                    <h1><strong>GitHub </strong> : {{ Auth::user()->profilecontact->github }}</h1>
                </div>
            </div>
        </div>

    </div>
    @endsection
