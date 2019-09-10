@extends('layouts.app')

@section('content')
    <div class="container">

            <div class="text-center">
                <h1><strong>Profiles</strong></h1>
            </div>
            <div class="text-center">
                <h1>To enter my profile mail: nikola@mail.com , pass: 123456789</h1>
            </div>

            <div class="row">

                @foreach ($users as $user)

                    <a href="/{{$user->id}}" class="col-6 pt-5 d-flex">

                        <div class="w-50 p-5">
                            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100" alt="">
                        </div>
                        <div class="w-50 pt-5 text-color">
                            <div class="pt-3"> {{$user->name}}</div>
                            <div> {{$user->email}} </div>
                            <div> {{$user->profilecontact->phone}} </div>
                            <div class="pt-3"> {{$user->profile->description}}</div>
                        </div>

                     </a>

                @endforeach

            </div>


    </div>
    @endsection
