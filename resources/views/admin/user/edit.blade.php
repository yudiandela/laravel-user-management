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
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update User</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Full Name</label>
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
                            <label for="email" class="col-sm-3 col-form-label">Email Address</label>
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
                            <label for="username" class="col-sm-3 col-form-label">Username</label>
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
                            <label for="name" class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="role" id="role2" value="2" @if ($user->role == 2) {{ 'checked=""' }}@endif>
                                        Admin
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="role" id="role3" value="3" @if ($user->role == 3) {{ 'checked=""' }}@endif>
                                        Staf
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="role" id="role99" value="99" @if ($user->role == 99) {{ 'checked=""' }}@endif>
                                        Member
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection