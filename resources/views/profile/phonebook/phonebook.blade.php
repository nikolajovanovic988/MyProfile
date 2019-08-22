@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="text-center">
                    <h1><strong>CONTACTS</strong></h1>
                </div>

                <div class="col-12">
                    <img src="{{ Auth::user()->profile->profileImage() }}" class="img-center-25" alt="">
                </div>

                <div class="text-center">
                    <h1>To enter my profile mail: nikola@mail.com , pass: 123456789</h1>
                </div>
            </div>
        </div>

        <phonebook-component></phonebook-component>

    </div>
    @endsection
