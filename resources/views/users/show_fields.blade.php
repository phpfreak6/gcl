<div class="row">
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('auth.full_name')</b> <br><a class="text-left">{{ $user->full_name }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('auth.email')</b> <br><a class="text-left">{{ $user->email }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/users.fields.company_name')</b> <br><a class="text-left">{{ $user->company_name }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/users.fields.phone_no')</b> <br><a class="text-left">{{ $user->phone_no }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/users.fields.registration_no')</b> <br><a class="text-left">{{ $user->registration_no }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/users.fields.industry')</b> <br><a class="text-left">{{ $user->industry }}</a>
        </li>
    </div>
 
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/users.fields.city')</b> <br><a class="text-left">{{ $user->city }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/users.fields.postal')</b> <br><a class="text-left">{{ $user->postal }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/users.fields.country')</b> <br><a class="text-left">{{ $user->country }}</a>
        </li>
    </div>

    <div class="col-md-6 col-sm-12">
        <li class="list-group-item mb-3">
            <b>@lang('models/users.fields.address_1')</b> <br><a class="text-left">{{ $user->address_1 }}</a>
        </li>
    </div>
    <div class="col-md-6 col-sm-12">
        <li class="list-group-item mb-3">
            <b>@lang('models/users.fields.address_2')</b> <br><a class="text-left">{{ $user->address_2 }}</a>
        </li>
    </div>
    <div class="col-md-3 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/users.fields.contact_name')</b> <br><a class="text-left">{{ $user->contact_first_name . ' ' . $user->contact_last_name }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/users.fields.contact_email')</b> <br><a class="text-left">{{ $user->contact_email }}</a>
        </li>
    </div> 
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/users.fields.contact_phone_no')</b> <br><a class="text-left">{{ $user->contact_phone_no }}</a>
        </li>
    </div>  

</div>
