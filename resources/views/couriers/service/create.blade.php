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
                        <h1 class="m-0 text-dark">{{ isset($service) ? 'Edit' : 'Add' }} Service</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body mt-5 table-responsive bg-white py-4 rounded">
            <form action="{{ isset($service) ? route('courier-services.update', $service->id) : route('courier-services.store') }}" method="POST" class="col-md-7 mx-auto">
                @if(session('success'))
                    <div class="alert alert-success my-3">
                        {{ session('success') }}
                    </div>
                @endif
                @csrf
                @if(isset($service))
                    @method('PUT')
                @endif

                <div class="form-group my-2">
                    <label for="parent_id">Parent Courier</label>
                    <select class="form-control @error('parent_id') is-invalid @enderror" id="parent_id" name="parent_id" required>
                        <option value="">Select a Parent Courier</option>
                        @foreach($parentCouriers as $courier)
                            <option value="{{ $courier->id }}" {{ (isset($service) && $service->parent_id == $courier->id) || old('parent_id') == $courier->id ? 'selected' : '' }}>{{ $courier->courier_name }}</option>
                        @endforeach
                    </select>
                    @error('parent_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="preset_id">Preset ID</label>
                    <input type="text" class="form-control @error('preset_id') is-invalid @enderror" id="preset_id" name="preset_id" value="{{ old('preset_id', isset($service) ? $service->preset_id : '') }}" required>
                    @error('preset_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="Name">Service Name</label>
                    <input type="text" class="form-control @error('Name') is-invalid @enderror" id="Name" name="Name" value="{{ old('Name', isset($service) ? $service->Name : '') }}" required>
                    @error('Name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="service_id">Service ID</label>
                    <input type="text" class="form-control @error('service_id') is-invalid @enderror" id="service_id" name="service_id" value="{{ old('service_id', isset($service) ? $service->service_id : '') }}" required>
                    @error('service_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="exp_lead_time">Expected Lead Time</label>
                    <select class="form-control @error('exp_lead_time') is-invalid @enderror" id="exp_lead_time" name="exp_lead_time" >
                        <option value="">Select Expected Lead Time</option>
                            <option value="same_day" {{ (isset($service) && $service->exp_lead_time == 'same_day') || old('exp_lead_time') == 'same_day' ? 'selected' : '' }}>Same Day</option>
                            <option value="next_day" {{ (isset($service) && $service->exp_lead_time == 'next_day') || old('exp_lead_time') == 'next_day' ? 'selected' : '' }}>Next Day</option>
                            <option value="two_day" {{ (isset($service) && $service->exp_lead_time == 'two_day') || old('exp_lead_time') == 'two_day' ? 'selected' : '' }}>Two Day</option>
                            <option value="two_day_plus" {{ (isset($service) && $service->exp_lead_time == 'two_day_plus') || old('exp_lead_time') == 'two_day_plus' ? 'selected' : '' }}>Two Day Plus</option>
                    </select>
                    @error('exp_lead_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class=" my-2">
                    <input type="checkbox" class="form-check-input @error('pickup') is-invalid @enderror" id="pickup" name="pickup" {{ old('pickup', isset($service) && $service->pickup == '1' ? 'checked' : '') }}>
                    @error('pickup')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label for="pickup">Pickup</label>

                    <input type="checkbox" class="form-check-input @error('dropoff') is-invalid @enderror" id="dropoff" name="dropoff" {{ old('dropoff', isset($service) && $service->dropoff == '1' ? 'checked' : '') }}>
                    @error('dropoff')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label for="dropoff">Drop Off</label>
                </div>

                <div class="form-group my-2">
                    <label for="service_key">Service Key</label>
                    <input type="text" class="form-control @error('service_key') is-invalid @enderror" id="service_key" name="service_key" value="{{ old('service_key', isset($service) ? $service->service_key : '') }}">
                    @error('service_key')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="service_code">Service Code</label>
                    <input type="text" class="form-control @error('service_code') is-invalid @enderror" id="service_code" name="service_code" value="{{ old('service_code', isset($service) ? $service->service_code : '') }}">
                    @error('service_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="service_surcharge">Service Surcharge</label>
                    <input type="text" class="form-control @error('service_surcharge') is-invalid @enderror" id="service_surcharge" name="service_surcharge" value="{{ old('service_surcharge', isset($service) ? $service->service_surcharge : '') }}">
                    @error('service_surcharge')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="global_product_code">Global Product Code</label>
                    <input type="text" class="form-control @error('global_product_code') is-invalid @enderror" id="global_product_code" name="global_product_code" value="{{ old('global_product_code', isset($service) ? $service->global_product_code : '') }}">
                    @error('global_product_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="local_product_code">Local Product Code</label>
                    <input type="text" class="form-control @error('local_product_code') is-invalid @enderror" id="local_product_code" name="local_product_code" value="{{ old('local_product_code', isset($service) ? $service->local_product_code : '') }}">
                    @error('local_product_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">{{ isset($service) ? 'Update' : 'Submit' }}</button>
            </form>
        </div>
    </section>
</main>
@endsection

@section('script')
@endsection
