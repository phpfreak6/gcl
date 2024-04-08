@extends('layouts.master')

@section('style')
@endsection

@section('content')
<main id="main" class="main">
    <section class="section dashboard">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ isset($courier) ? 'Edit' : 'Add' }} Courier</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body mt-5 table-responsive bg-white py-4 rounded">

            <form action="{{ isset($courier) ? route('couriers.update', $courier->id) : route('couriers.store') }}" method="POST" class="col-md-7 mx-auto" enctype="multipart/form-data">
                @if(session('success'))
                    <div class="alert alert-success my-3">
                        {{ session('success') }}
                    </div>
                @endif
                @csrf
                @if(isset($courier))
                    @method('PUT')
                @endif

                <div class="form-group my-2">
                    <label for="courier_name">Courier Name</label>
                    <input type="text" class="form-control @error('courier_name') is-invalid @enderror" id="courier_name" name="courier_name" placeholder="Enter Courier Name" value="{{ old('courier_name', isset($courier) ? $courier->courier_name : '') }}" required>
                    @error('courier_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="auth_company">Auth Company</label>
                    <input type="text" class="form-control @error('auth_company') is-invalid @enderror" id="auth_company" name="auth_company" placeholder="Enter Auth Company" value="{{ old('auth_company', isset($courier) ? $courier->auth_company : '') }}" required>
                    @error('auth_company')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control-file @error('logo') is-invalid @enderror" id="logo" name="logo">
                    @if(isset($courier) && $courier->logo)
                    <div class="mt-2">
                        @if(isset($courier) && $courier->logo)
                            <img src="{{ asset($courier->logo) }}" alt="Current Logo" style="max-height: 100px;">
                        @endif
                    </div>

                    @endif
                    @error('logo')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="short_description">Short Description</label>
                    <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="2" placeholder="Enter a short description">{{ old('short_description', isset($courier) ? $courier->short_description : '') }}</textarea>
                    @error('short_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="long_description">Long Description</label>
                    <textarea class="form-control @error('long_description') is-invalid @enderror" id="long_description" name="long_description" rows="4" placeholder="Enter a long description">{{ old('long_description', isset($courier) ? $courier->long_description : '') }}</textarea>
                    @error('long_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">{{ isset($courier) ? 'Update' : 'Submit' }}</button>
            </form>
        </div>
    </section>
</main>
@endsection

@section('script')
@endsection
