@extends('layouts.main')

@section('content')

    <!-- Page header -->
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-account-multiple"></i>
            </span>
            {{ __('Add New User') }}
        </h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Update User') }}</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">{{ __('Full Name') }}</label>
                            <div class="col-sm-6">
                                <input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') ? old('name') : $user->name }}" id="name" placeholder="Full Name">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">{{ __('Email Address') }}</label>
                            <div class="col-sm-6">
                                <input name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') ? old('email') : $user->email }}" id="email" placeholder="Email Address">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">{{ __('Username') }}</label>
                            <div class="col-sm-6">
                                <input name="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') ? old('username') : $user->username }}" id="username" placeholder="Username">
                                @if ($errors->has('username'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('username') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">{{ __('Role') }}</label>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="role" id="role2" value="2" @if ($user->role == 2) {{ 'checked=""' }}@endif>
                                        {{ __('Admin') }}
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="role" id="role3" value="3" @if ($user->role == 3) {{ 'checked=""' }}@endif>
                                        {{ __('Staf') }}
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="role" id="role99" value="99" @if ($user->role == 99) {{ 'checked=""' }}@endif>
                                        {{ __('Member') }}
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-sm-3 col-form-label">{{ __('Photo') }}</label>
                            <div class="col-sm-6">
                                <input type="file" name="photo" class="file-upload-default" value="{{ old('photo') ? old('photo') : $user->photo }}">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info{{ $errors->has('photo') ? ' is-invalid' : '' }}" value="{{ old('photo') ? old('photo') : $user->photo }}" disabled="" placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">{{ __('Image') }}</button>
                                    </span>
                                    @if ($errors->has('photo'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('photo') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-gradient-primary mr-2">{{ __('Submit') }}</button>
                                <a href="{{ route('admin.user.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection