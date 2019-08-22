@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="position-ref full-height">

            <div class="content">
                <div class="text-center">
                    <h1><strong>TODO</strong></h1>
                </div>

                <div class="col-12">
                    <img src="{{ $user->profile->profileImage() }}" class="img-center-25" alt="">
                </div>

                <div class="text-center">
                    <h1>To enter my profile mail: nikola@mail.com , pass: 123456789</h1>
                </div>
            </div>
        </div>

        <todo-component user-id='{{ $user->id }}'></todo-component>


    </div>
    @endsection
