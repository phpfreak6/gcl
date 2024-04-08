@extends('layouts.master')

@section('content')
<main id="main" class="main">
    <section class="section dashboard">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Get Quotes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Get Quotes</li>
                    </ol>
                </div>
            </div>
        </div>
  </div>
  <div class="content">
    @include('flash::message')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Get Quotes Detail</h3>
        </div>
        <div class="card-body table-responsive" >
            @include('quotes.quote_form')
        </div>
    </div>
</div>
    </section>
</main>
@endsection
