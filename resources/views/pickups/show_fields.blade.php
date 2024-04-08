<div class="row">
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/pickups.fields.date')</b> <br><a class="text-left">{{ $pickup->date }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/pickups.fields.earliest_time')</b> <br><a class="text-left">{{ $pickup->earliest_time }}</a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/pickups.fields.latest_time')</b> <br><a class="text-left">{{ $pickup->latest_time }}</a>
        </li>
    </div>
    <div class="col-md-2 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/pickups.fields.courier')</b> <br><a class="text-left">{{ $pickup->courier }}</a>
        </li>
    </div>
    <div class="col-md-2 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/pickups.fields.no_packages')</b> <br><a class="text-left">{{ $pickup->no_packages }}</a>
        </li>
    </div>
    <div class="col-md-2 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/pickups.fields.weight')</b> <br><a class="text-left">{{ $pickup->weight }}</a>
        </li>
    </div>
    <div class="col-md-2 col-sm-12">
        <li class="list-group-item mb-3">
            <b>@lang('models/pickups.fields.length')</b> <br><a class="text-left">{{ $pickup->length }}</a>
        </li>
    </div>
    <div class="col-md-2 col-sm-12">
        <li class="list-group-item mb-3">
            <b>@lang('models/pickups.fields.width')</b> <br><a class="text-left">{{ $pickup->width }}</a>
        </li>
    </div>
    <div class="col-md-2 col-sm-12">
        <li class="list-group-item mb-3">
            <b>@lang('models/pickups.fields.height')</b> <br><a class="text-left">{{ $pickup->height }}</a>
        </li>
    </div>
    <div class="col-md-12 col-sm-6">
        <li class="list-group-item mb-3">
            <b>@lang('models/pickups.fields.instructions')</b> <br><a class="text-left">{{ $pickup->instructions }}</a>
        </li>
    </div>
</div>
