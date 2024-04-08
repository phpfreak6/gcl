<div class="row">

    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>User Code</b> <br><a class="text-left">{{ $pickup->customer->user_code ? $pickup->customer->user_code : "SH-".$pickup->customer->id }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>DC Id</b> <br><a class="text-left">{{ $pickup->customer->dcID ? $pickup->customer->dcID : 'Not available' }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>Full Name</b> <br><a class="text-left">{{ $pickup->customer->first_name && $pickup->customer->last_name ? $pickup->customer->first_name." ".$pickup->customer->last_name : 'Not available' }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>Email</b> <br><a class="text-left">{{ $pickup->customer->email ? $pickup->customer->email : 'Not available' }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>Phone</b> <br><a class="text-left">{{ $pickup->customer->phone_no ? $pickup->customer->phone_no : 'Not available' }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>Address 1</b> <br><a class="text-left">{{ $pickup->customer->address_1 ? $pickup->customer->address_1 : 'Not available' }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>Address 2</b> <br><a class="text-left">{{ $pickup->customer->address_2 ? $pickup->customer->address_2 : 'Not available' }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>City</b> <br><a class="text-left">{{ $pickup->customer->city ? $pickup->customer->city : 'Not available' }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>Town</b> <br><a class="text-left">{{ $pickup->customer->town ? $pickup->customer->town : 'Not available' }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>Postal</b> <br><a class="text-left">{{ $pickup->customer->postal ? $pickup->customer->postal : 'Not available' }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>Company Name</b> <br><a class="text-left">{{ $pickup->customer->company_name ? $pickup->customer->company_name : 'Not available' }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>Contact Name</b> <br><a class="text-left">{{ $pickup->customer->contact_first_name && $pickup->customer->contact_last_name ? $pickup->customer->contact_first_name . " ".$pickup->customer->contact_last_name : 'Not available' }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>Contact Email</b> <br><a class="text-left">{{ $pickup->customer->contact_email ? $pickup->customer->contact_email : 'Not available' }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>Contact Phone</b> <br><a class="text-left">{{ $pickup->customer->contact_phone_no ? $pickup->customer->contact_phone_no : 'Not available' }}</a>
        </li>
    </div>
</div>
