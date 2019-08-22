@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ Auth::user()->id }}/projects/{{$project->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-md-8 offset-2">

                <div class="row">
                    <h1>Edit project</h1>
                </div>

                <div class="row">
                        <label for="video" class="col-md-4 col-form-label">Insert video</label>

                        <input type="file" class="form-control-file" id="video" name="video">

                        @error('video')
                            <strong>{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label text-md-right">description:</label>

                    <div class="col-md-8">
                        <textarea
                        name="description"
                        id="description"
                        cols="30" rows="5"
                        class="form-control @error('description') is-invalid @enderror"
                        required autocomplete="description" autofocus
                        >{{$project->description}}</textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>

                <div class="form-group row">
                    <label for="idea" class="col-md-2 col-form-label text-md-right">idea:</label>

                    <div class="col-md-8">
                        <textarea
                        name="idea"
                        id="idea"
                        cols="30" rows="5"
                        class="form-control @error('idea') is-invalid @enderror"
                        required autocomplete="idea" autofocus
                        >{{$project->idea}}</textarea>

                        @error('idea')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="techonologie" class="col-md-2 col-form-label text-md-right">techonologie:</label>

                    <div class="col-md-8">
                        <input id="techonologie"
                        type="text"
                        class="form-control @error('techonologie') is-invalid @enderror"
                        name="techonologie"
                        value="{{ old('techonologie') ?? $project->techonologie}}"
                        required autocomplete="techonologie" autofocus>

                        @error('techonologie')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="link" class="col-md-2 col-form-label text-md-right">link:</label>

                    <div class="col-md-8">
                        <input id="link"
                        type="text"
                        class="form-control @error('link') is-invalid @enderror"
                        name="link"
                        value="{{ old('link') ?? $project->link}}"
                        required autocomplete="link" autofocus>

                        @error('link')
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
