@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ Auth::user()->id }}/contact" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-md-8 offset-2">

                <div class="row">
                        <h1>Update contact</h1>
                </div>

                <div class="form-group row">
                    <label for="facebook" class="col-md-2 col-form-label text-md-right">Facebook:</label>

                    <div class="col-md-8">
                        <input id="facebook"
                        type="text"
                        class="form-control @error('facebook') is-invalid @enderror"
                        name="facebook"
                        value="{{ old('facebook') ?? Auth::user()->profilecontact->facebook}}"
                        required autocomplete="facebook" autofocus>

                        @error('facebook')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="linkedin" class="col-md-2 col-form-label text-md-right">linkedin:</label>

                    <div class="col-md-8">
                        <input id="linkedin"
                        type="text"
                        class="form-control @error('linkedin') is-invalid @enderror"
                        name="linkedin"
                        value="{{ old('linkedin') ?? Auth::user()->profilecontact->linkedin}}"
                        required autocomplete="linkedin" autofocus>

                        @error('linkedin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="skype" class="col-md-2 col-form-label text-md-right">skype:</label>

                    <div class="col-md-8">
                        <input id="skype"
                        type="text"
                        class="form-control @error('skype') is-invalid @enderror"
                        name="skype"
                        value="{{ old('skype') ?? Auth::user()->profilecontact->skype}}"
                        required autocomplete="skype" autofocus>

                        @error('skype')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-2 col-form-label text-md-right">phone:</label>

                    <div class="col-md-8">
                        <input id="phone"
                        type="text"
                        class="form-control @error('phone') is-invalid @enderror"
                        name="phone"
                        value="{{ old('phone') ?? Auth::user()->profilecontact->phone}}"
                        required autocomplete="phone" autofocus>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="github" class="col-md-2 col-form-label text-md-right">github:</label>

                    <div class="col-md-8">
                        <input id="github"
                        type="text"
                        class="form-control @error('github') is-invalid @enderror"
                        name="github"
                        value="{{ old('github') ?? Auth::user()->profilecontact->github}}"
                        required autocomplete="github" autofocus>

                        @error('github')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row pt-3">
                    <button class="btn btn-primary">Change</button></button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
