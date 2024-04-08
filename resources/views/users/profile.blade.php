@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">User Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $user->name }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    @include('flash::message')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    {!! Form::model($user, ['route' => ['users.update_user_profile', $user->id], 'method' => 'put', 'files' => true]) !!}
                        @include('users.profile_fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
