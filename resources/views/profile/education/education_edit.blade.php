@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ Auth::user()->id }}/education/{{$education->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="row">
                        <h1>Update education</h1>
                </div>

                <div class="form-group row">
                    <label for="school" class="col-md-2 col-form-label text-md-right">school:</label>

                    <div class="col-md-8">
                        <input id="school"
                        type="text"
                        class="form-control @error('school') is-invalid @enderror"
                        name="school"
                        value="{{ old('school') ?? $education->school}}"
                        required autocomplete="school" autofocus>

                        @error('school')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="degree" class="col-md-2 col-form-label text-md-right">degree:</label>

                    <div class="col-md-8">
                        <input id="degree"
                        type="text"
                        class="form-control @error('degree') is-invalid @enderror"
                        name="degree"
                        value="{{ old('degree') ?? $education->degree}}"
                        required autocomplete="degree" autofocus>

                        @error('degree')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="field" class="col-md-2 col-form-label text-md-right">field:</label>

                    <div class="col-md-8">
                        <input id="field"
                        type="text"
                        class="form-control @error('field') is-invalid @enderror"
                        name="field"
                        value="{{ old('field') ?? $education->field}}"
                        required autocomplete="field" autofocus>

                        @error('field')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="startyear" class="col-md-2 col-form-label text-md-right">startyear:</label>

                    <div class="col-md-4">
                        <input id="startyear"
                        type="text"
                        class="form-control @error('startyear') is-invalid @enderror"
                        name="startyear"
                        value="{{ old('startyear') ?? $education->startyear}}"
                        required autocomplete="startyear" autofocus>

                        @error('startyear')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="endyear" class="col-md-2 col-form-label text-md-right">endyear:</label>

                    <div class="col-md-4">
                        <input id="endyear"
                        type="text"
                        class="form-control @error('endyear') is-invalid @enderror"
                        name="endyear"
                        value="{{ old('endyear') ?? $education->endyear}}"
                        required autocomplete="endyear" autofocus>

                        @error('endyear')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="achieves" class="col-md-2 col-form-label text-md-right">achieves:</label>

                    <div class="col-md-8">
                        <textarea
                        name="achieves"
                        id="achieves"
                        cols="30" rows="10"
                        class="form-control @error('achieves') is-invalid @enderror"
                        required autocomplete="achieves" autofocus
                        >{{$education->achieves}}</textarea>

                        @error('achieves')
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
