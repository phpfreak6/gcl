@section('css')
    @include('layouts.datatables_css')
    <style>
        .badge-success{
            background-color: rgba(0, 128, 0, 0.622)
        }
        .badge-danger{
            background-color:#dc3545
        }
    </style>

@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-hover table-bordered table-striped table-sm']) !!}

@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection
