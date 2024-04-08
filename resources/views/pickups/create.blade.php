@extends('layouts.master')

@section('content')
<main id="main" class="main">
    <section class="section dashboard">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Pickup Request</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pickups.index') }}">Pickup Requests</a></li>
                    <li class="breadcrumb-item active">Create Pickup Request</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-body p-5">
                    {!! Form::open(['route' => 'pickups.store','files' => true,'class' => 'formAlert']) !!}
                        @include('pickups.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
    </section>
</main>
@endsection
