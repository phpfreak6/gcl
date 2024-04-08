@extends('layouts.master')
@section('title', 'Get Quotes')
@section('content')
@section('style')
<style>
   [class^='select2'] {
   border: none !important;
   }
   .custom{
   color:grey;
   }
   .invalid-feedback {
    color: #dc3545; /* Bootstrap's default error color */
    font-size: 14px;
    padding-top: 8px;
}

</style>
@endsection
<main id="main" class="main">
    <section class="section dashboard">
<div class="row my-5">
   <div class="co-12 my-md-5">
      <h1 class="text-primary">Send a Package</h1>
      <p class="text-muted">Send a package with the most reliable couriers in the UK</p>
   </div>
   <form method="POST" id="quoteForm" action="{{route('quote.get')}}" class="needs-validation" novalidate>
    @csrf
    <div class="col-12 row justify-content-between">
      <!-- Origin -->
      <div class="col-xl-2 col-lg-4 col-md-6 my-4 col-sm-6 col-12">
         <b class="w-100">Origin</b>
         <div class="d-flex mt-2 py-2 px-1 wrapper wrappers  position-relative align-items-center justify-content-start bg-white rounded shadow">
            {{-- <select class=" col-4 {{ $errors->has('country')?'is-invalid':'' }}" name="origin_country">
                @foreach ($countries as $country)
                @if (in_array($country->name, Auth::user()->favoriteCountries->pluck('country_name')->toArray()))

                <option {{ $country->code == Auth::User()->country? 'selected="selected"' : '' }} value="{{ $country->code }}">

                    </option>
                    @endif
                @endforeach
            </select> --}}
            <div class="btn-group">
               <button type="button" class="btn text-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-haspopup="true" aria-expanded="false">
                <input type="hidden"  {{ $errors->has('country')?'is-invalid':'' }} value="{{Auth::user()->country}}" id="origin_country" name="origin_country">
                  <span class="me-2" id="selected-country">
                     <img src="https://hatscripts.github.io/circle-flags/flags/{{ strtolower(Auth::user()->country) }}.svg" style="margin-top:-3px" width="18">  {{ Auth::user()->country }}
                   </span>
                   <span class="visually-hidden">Toggle Dropdown</span>
               </button>
           </div>
           <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="countryModalLabel">Select origin country</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
                       <div class="modal-body d-flex flex-wrap">
                           @foreach ($countries as $country)
                               @if (in_array($country->name, Auth::user()->favoriteCountries->pluck('country_name')->toArray()))
                                   <div class="form-check col-sm-3 col-4 my-3 d-flex flex-wrap align-items-center justify-content-start">
                                    <input type="radio" role="button" name="selectedCountry" id="{{ $country->code }}" value="{{ $country->code }}" onclick="updateSelectedCountry('{{ $country->code }}')">
                                    <img class="mx-1" src="https://hatscripts.github.io/circle-flags/flags/{{ strtolower($country->code) }}.svg" width="18">

                                       <label class="form-check-label" for="{{ $country->code }}">
                                           {{ $country->code }}
                                       </label>
                                   </div>
                               @endif
                           @endforeach
                       </div>

                   </div>
               </div>
           </div>

            <div class="form-group col ">
                <input type="text" value="{{Auth::User()->postal}}" placeholder="Postal Code" name="origin_postal" class="form-control shadow-none border-0" required>
                <div class="invalid-feedback position-absolute top-100 start-0">
                    Enter Postal Code.
                </div>
            </div>
        </div>

      </div>



      <!-- Destination -->
      <div class="col-xl-2 col-lg-4 col-md-6 my-4 col-sm-6 col-12">
         <b class="w-100">Destination</b>
         <div class="d-flex mt-2 position-relative wrappers py-2 px-1  align-items-center justify-content-start bg-white rounded shadow">
            {{-- <select class=" col-4 {{ $errors->has('country')?'is-invalid':'' }}" name="country">
               @foreach ($countries as $country)
               @if (in_array($country->name, Auth::user()->favoriteCountries->pluck('country_name')->toArray()))

               <option {{ $country->code == Auth::User()->country? 'selected="selected"' : '' }} value="{{ $country->code }}">
                   {{ $country->code }}
                   </option>
                   @endif
               @endforeach



            </select> --}}

            <div class="btn-group">
               <button type="button" class="btn text-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="modal" data-bs-target="#exampleDesModal" aria-haspopup="true" aria-expanded="false">
                <input type="hidden"  {{ $errors->has('country')?'is-invalid':'' }} value="{{Auth::user()->country}}" id="country" name="country">
                  <span class="me-2" id="selected-des-country">
                     <img src="https://hatscripts.github.io/circle-flags/flags/{{ strtolower(Auth::user()->country) }}.svg" style="margin-top:-3px" width="18">  {{ Auth::user()->country }}
                   </span>
                   <span class="visually-hidden">Toggle Dropdown</span>
               </button>
           </div>
           <div class="modal fade" id="exampleDesModal" tabindex="-1" aria-labelledby="exampleModalDesLabel" aria-hidden="true">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="countryModalLabel">Select destination country</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
                       <div class="modal-body d-flex flex-wrap">
                           @foreach ($countries as $country)
                               @if (in_array($country->name, Auth::user()->favoriteCountries->pluck('country_name')->toArray()))
                                   <div class="form-check col-sm-3 col-4 my-3 d-flex flex-wrap align-items-center justify-content-start">
                                    <input type="radio" role="button" name="selectedDesCountry" id="{{ $country->code }}" value="{{ $country->code }}" onclick="updateSelectedDesCountry('{{ $country->code }}')">
                                    <img class="mx-1" src="https://hatscripts.github.io/circle-flags/flags/{{ strtolower($country->code) }}.svg" width="18">

                                       <label class="form-check-label" for="{{ $country->code }}">
                                           {{ $country->code }}
                                       </label>
                                   </div>
                               @endif
                           @endforeach
                       </div>

                   </div>
               </div>
           </div>
            <div class="form-group col ">
                <input type="text" name="postal" placeholder="Postal Code" class="form-control shadow-none border-0" required>
                <div class="invalid-feedback position-absolute top-100 start-0" >
                    Enter Postal Code.
                </div>
            </div>
         </div>
      </div>
      <!-- Delivery Option -->
      <div class="col-xl-2 col-lg-4 col-md-6 my-4 col-sm-6 col-12">
         <b class="w-100">Package Type</b>
         <div class="d-flex form-group wrappers position-relative mt-2 py-2 px-1  align-items-center justify-content-start bg-white rounded shadow">
            {{-- <iconify-icon class="mx-1 text-primary" icon="arcticons:parcel-tracker"></iconify-icon> --}}
            <select required id="delivery-option" placeholder="Parcel or Pallet" style="border: none" class="form-control shadow-none border-0">
               <option value="" selected disabled>Package Type</option>
               <option value="Parcel">Parcel</option>
               <option value="Pallet">Pallet</option>
            </select>
            <div class="invalid-feedback position-absolute top-100 start-0">
                Select Package Type.
            </div>
         </div>
      </div>
      <!-- Weight -->
      {{-- <div class="col-xl-2 col-lg-4 col-md-6 my-4 col-sm-6 col-12">
         <b class="w-100">Weight</b>
         <div class="input-group form-group position-relative d-flex mt-2 py-2 px-1  align-items-center justify-content-start bg-white rounded shadow">
            <span class="input-group-btn">
               <button id="weight-minus" type="button" class="btn btn-default btn-number" data-type="minus" data-field="weight">
                  <iconify-icon class="text-muted glyphicon-minus" icon="zondicons:minus-solid"></iconify-icon>
               </button>
            </span>
            <input  id="weight-input" type="text" name="weight" class="form-control border-0 text-center shadow-none input-number" value="0" min="0" max="1200">
            <div  id="invalid-weight" class="invalid-feedback position-absolute top-100 start-0">
                Weignt must be between 1-1200.
            </div>

            <span class="input-group-btn">
               <button id="weight-plus" type="button" class="btn btn-default btn-number" data-type="plus" data-field="weight">
                  <iconify-icon class="text-muted glyphicon-plus" icon="subway:add"></iconify-icon>
               </button>
            </span>
         </div>
      </div> --}}
      <div class="col-xl-2 col-lg-4 col-md-6 my-4 col-sm-6 col-12">
         <b class="w-100">Quantity</b>
         <div class="input-group d-flex mt-2 py-2 px-1 position-relative  align-items-center justify-content-start bg-white rounded shadow">
            <span class="input-group-btn">
               <button id="quantity-minus" type="button" class="btn btn-default btn-number" data-type="minus" name="quantity" data-field="quantity">
                  <iconify-icon class="text-muted glyphicon-minus" icon="zondicons:minus-solid"></iconify-icon>
               </button>
            </span>
            <input id="quantity-input" type="text" name="quantity" class="form-control border-0 text-center shadow-none input-number" value="0" min="0" max="100000">
            <div  id="invalid-quantity" class="invalid-feedback position-absolute top-100 start-0">
                Invalid quantity.
            </div>
            <span class="input-group-btn">
               <button id="quantity-plus" type="button" class="btn btn-default btn-number" data-type="plus" data-field="quantity">
                  <iconify-icon class="text-muted glyphicon-plus" icon="subway:add"></iconify-icon>
               </button>
            </span>
         </div>
      </div>
      <input value="" name="package_type" id="package_type" hidden>
      <!-- Get a Quote Button -->
      <div class="col-xl-2 col-lg-4 col-md-6 my-4 col-sm-6 col-12 d-flex align-items-center">
         <button id="submitBtn" class="btn btn-primary text-white rounded-3 w-100" style="margin-top:32px;padding-top:13px;padding-bottom:13px">GET A QUOTE</button>
      </div>
   </div>
   @include('quotes.Component.pallet')
   @include('quotes.Component.parcel')
</form>
</section>
</main>
@endsection
@section('script')
<script>


function updateSelectedCountry(code) {
    document.getElementById('selected-country').innerHTML = `<img src="https://hatscripts.github.io/circle-flags/flags/${code.toLowerCase()}.svg" width="18"> ${code}`;
    document.getElementById('origin_country').value = code;
}

function updateSelectedDesCountry(code) {
    document.getElementById('selected-des-country').innerHTML = `<img src="https://hatscripts.github.io/circle-flags/flags/${code.toLowerCase()}.svg" width="18"> ${code}`;
    document.getElementById('country').value = code;
}



   </script>
@include('quotes.quote-script');
@endsection