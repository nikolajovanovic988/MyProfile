@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1><strong>EDUCATION</strong></h1>
                    <a href="/profile/{{ Auth::user()->id }}/education/create">add education</a>
                </div>

                <div class="col-12">
                    <img src="{{ Auth::user()->profile->profileImage() }}" class="img-center-25" alt="">
                </div>

            </div>

            <div class="row">
                @foreach (Auth::user()->profileeducations as $education)
                    <div class="col-lg-6 pt-5">

                        <p>School : {{$education->school}}</p>
                        <p>Degree : {{$education->degree}}</p>
                        <p>Field : {{$education->field}}</p>
                        <p>Startyear : {{$education->startyear}}</p>
                        <p>Endyear : {{$education->endyear}}</p>
                        <p>Achieves : {{$education->achieves}}</p>

                        <div class="row">
                            <form action="/profile/{{ Auth::user()->id }}/education/delete/{{$education->id}}"
                                enctype="multipart/form-data"
                                class="col-3"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row pt-3">
                                        <button class="btn btn-primary">Delete</button></button>
                                </div>

                            </form>

                            <form action="/profile/{{ Auth::user()->id }}/education/edit/{{$education->id}}" class="col-3">

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
