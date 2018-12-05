@extends('layouts.main')

@section('content')

    <!-- Page header -->
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-account-multiple"></i>
            </span>
            {{ __('Users Table') }}
        </h3>

        <nav aria-label="breadcrumb">
            <ul class="breadcrumb p-0">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-gradient-primary">
                        Add New User
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body p-3">

                    @if (session('success'))
                        <div class="alert alert-fill-success" role="alert">
                            <i class="mdi mdi-alert-circle"></i>
                            {{ session('success') }}
                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </a>
                        </div>
                    @elseif (session('failed'))
                        <div class="alert alert-fill-danger" role="alert">
                            <i class="mdi mdi-alert-circle"></i>
                            {{ session('failed') }}
                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </a>
                        </div>
                    @endif

                    {{-- <h4 class="card-title">{{ __('Users Table') }}</h4> --}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Username </th>
                                    <th> Role </th>
                                    <th> Status </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp

                                @if ($users->count() > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                {{ $no++ }}
                                            </td>
                                            <td>
                                                <img src="{{ $user->user_image }}" class="mr-2" alt="image">
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ $user->username }}
                                            </td>
                                            <td>
                                                {{ $user->roleString() }}
                                            </td>
                                            <td>
                                                @if ($user->email_verified_at)
                                                    <label class="badge badge-gradient-success">{{ __('ACTIVE') }}</label>
                                                @else
                                                    <label class="badge badge-gradient-danger">{{ __('NOT ACTIVE') }}</label>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.user.edit', $user->id) }}" class="text-success"> Edit </a> |
                                                <a href="{{ route('admin.user.destroy', $user->id) }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('delete-user-{{ $user->id }}').submit();"
                                                    class="text-danger"> {{ __('Delete') }}
                                                </a>
                                                <form id="delete-user-{{ $user->id }}" hidden action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">No data</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        {{ $users->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection