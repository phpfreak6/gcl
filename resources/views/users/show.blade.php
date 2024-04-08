@extends('layouts.master')

@section('content')
<main id="main" class="main">
    <section class="section  dashboard">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">@lang('crud.detail') User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{!! route('users.index') !!}">User</a></li>
                        <li class="breadcrumb-item active">@lang('crud.detail')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        @include('flash::message')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-body p-5">
                        <h5 class="my-3 text-muted text-center"> <b>User Detail</b></h5>
                        <ul class="list-group list-group-unbordered mb-3">
                            @include('users.show_fields')
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</main>
@endsection
