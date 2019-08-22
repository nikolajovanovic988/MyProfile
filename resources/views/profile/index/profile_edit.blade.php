@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ Auth::user()->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-md-8 offset-2">

                <div class="row">
                        <h1>Update profile</h1>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Describe yourself</label>


                    <input id="description"
                        type="text"
                        class="form-control @error('description') is-invalid @enderror"
                        name="description"
                        value="{{ old('description') ?? Auth::user()->profile->description}}"
                        required autocomplete="description" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Insert image</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="row pt-3">
                    <button class="btn btn-primary">Change</button></button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
