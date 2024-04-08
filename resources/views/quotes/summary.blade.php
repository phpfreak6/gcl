@extends('layouts.master')
@section('title', 'Quote Summary')
@section('style')
@endsection
@section('content')
<main id="main" class="main">
   @if(!empty($selectedQuote))
   <section class="section dashboard">
    <form method="post" action="{{route('quote.getAddress')}}">
     @csrf

     <input type="text" value="{{$selectedQuote['service_code']}}" name="preset_id" hidden>
     <input type="text" value="{{$selectedQuote['courier']}}" name="courier" hidden>
     <input type="text" value="{{$selectedQuote['price']['total']}}" name="courier_price" hidden>

        <div class=" my-4 py-5 px-4 form bg-white shadow " style="position: relative; z-index: 1; border-left: 6px solid #309cdc; border-top: 2px solid #309cdc;">
         <div class="row d-flex flex-wrap justify-content-between">
            <div class="col-lg-3 col-md-6 text-center col-12">
               <img src="{{ getImage($selectedQuote['courier'])['logo'] }}"  class="w-50 mb-3" alt="">
               <h3>{{$selectedQuote['courier']}}</h3>
               <p>{{$selectedQuote['service_name']}}</p>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
               <h3>When do you want to ship ?</h3>
               <div class="form-group  mt-3 ms-3">
                  <label for="datepicker" class="py-2"> Date and Time:</label>
                  <div class="input-group">
                    <input required placeholder="Choose your shipping date" type="datetime-local" id="datepicker" name="datepicker" class="form-control custom-blue-bg" oninput="validateDate()">

                  </div>
               </div>
               <div class=" col-12 mt-4 ms-auto me-4">
                  {{-- <a href="/delivery-rates" class="btn btn-primary text-white rounded-3 w-100" style="margin-top:32px;padding-top:13px;padding-bottom:13px">GET A QUOTE</a> --}}
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
               <div class="col-md-12 d-flex flex-wrap ">
                  <div class="col-3">
                     <button class="text-white btn btn-primary rounded-pill">Day 1</button>
                  </div>
                  <div class="col-9 px-4">
                     <h4>Deliverd By</h4>
                     <p>12:00 PM</p>
                     <p>{{$selectedQuote['courier']}}</p>
                  </div>
               </div>
               <div class="col-md-12 mt-5 d-flex flex-wrap ">
                  <div class="col-3">
                     <button class="text-white btn btn-primary rounded-pill">Day 2</button>
                  </div>
                  <div class="col-9 px-4">
                     <h4>Arrived By</h4>
                     <p>12:00 PM</p>
                     <p>{{$selectedQuote['courier']}}</p>
                  </div>
               </div>
            </div>
         </div>
         <hr>
         <div class="row d-flex flex-wrap">
            <div class="col-md-6 col-12">
               <h3 class="my-3">Shipping Summary - £{{$selectedQuote['price']['total']}}</h3>
               <div class="col-12 d-flex justify-content-between mb-2">
                  <div class="col-6 text-start text-muted">Chargeable Weights</div>
                  <div class="col-6 text-end font-bold">{{$totalWeight}}kg</div>
               </div>
               <div class="col-12 d-flex justify-content-between mb-2">
                  <div class="col-6 text-start text-muted">Shipping Charges</div>
                  <div class="col-6 text-end font-bold">£{{$selectedQuote['price']['total']}}</div>
               </div>
               <div class="col-12 d-flex justify-content-between mb-2">
                  <div class="col-6 text-start text-muted">VAT</div>
                  <div class="col-6 text-end font-bold">£{{$vat = $selectedQuote['price']['total'] * 0.20}}</div>
               </div>
               <hr class="my-2">
               <div class="col-12 d-flex justify-content-between mb-2">
                  <div class="col-6 text-start text-muted" style="font-size: '25px'">Total</div>
                  <div class="col-6 text-end font-bold">£{{$selectedQuote['price']['total'] + $vat}} inc VAT</div>
               </div>
               {{-- <div class="col-12 d-flex justify-content-between mb-2">
                  <div class="col-6 text-start text-muted" style="font-size: '25px'">Delivery Charges Per KG</div>
                  <div class="col-6 text-end font-bold">
                     £{{ number_format(($selectedQuote['price']['total']) / $totalWeight, 2) }}/KG
                </div> --}}

               </div>

            </div>
            <div class="col-md-6 d-flex align-items-end justify-content-end"></div>
         </div>
         <div class="col-12 d-flex justify-content-between mt-5">
            <div class="col-sm-4">
               <a href="{{ url()->previous() }}" class="btn btn-secondary text-white  ">Cancel</a>
            </div>
            <div class="col-sm-8 text-end">
               <button type="submit" class="btn btn-primary ms-start mt-auto text-white">Continue</button>
            </div>
         </div>
      </div>
    </form>
   </section>
   @endif
</main>
@endsection

@section('script')

<script>
function validateDate() {
    var currentDate = new Date();
    var selectedDate = new Date(document.getElementById('datepicker').value);
   //  selectedDate.setHours(currentDate.getHours() + 1);
    currentDate.setHours(0,0,0,0);

    // Check if the selected date is a weekend (Saturday or Sunday)
    if (selectedDate.getDay() === 0 || selectedDate.getDay() === 6) {
      toastr.error("Please select a date that is not a weekend (Saturday or Sunday).");
        document.getElementById('datepicker').value = ''; // Clear the input value
        return;
    }

    // Calculate the date 10 days from now
    var maxDate = new Date();
    maxDate.setDate(currentDate.getDate() + 10);

      console.log(currentDate,'currentDate');
      console.log(maxDate,'maxDate');
      console.log(selectedDate,'selectedDate');
    // Compare the selected date with the current date and the maximum allowed date
    if (selectedDate < currentDate || selectedDate > maxDate) {
      toastr.error("Please select a date within the next 10 days.");
        document.getElementById('datepicker').value = ''; // Clear the input value
    }
}


    </script>
@endsection