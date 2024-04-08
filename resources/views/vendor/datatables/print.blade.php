<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Print Table</title>
        <meta charset="UTF-8">
        <meta name=description content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ public_path('css\bootstrap.min.css') }}" media="all" />
        <style>
            body {margin: 20px}
            .k-body .form-group {
                margin-bottom: 0.2rem;
            }
            .k-body hr {
            margin-top: 0.3rem;
            margin-bottom:0.3rem;
            }
            .k-logo img{
                width:200px;
            }
            .k-card-custom{
                padding: 10px;
                margin-bottom:5px;
            }
            .k-header{
                padding: 7px 15px;
                border: 1px solid #c49737;
                border-radius: 12px;
            }
            .header-info p {
            margin-bottom: 0;
        }
            .header-info h2{
                margin-bottom: 0;
                font-size: 22px;
            }
            .header-info p{
                margin-bottom: 0;
            }
            .k-body{
                padding: 8px 10px;
                border: 1px solid #c49737;
                border-radius: 12px;
                margin-top: 15px;
            }
            .k-body h4{
                font-size: 1.2rem;
            }
            .k-dhs{

            }
            .k-dhs-field{
                width: 108%;
                height: 50px;
                border-bottom-left-radius: 8px;
                border-top-left-radius: 8px;
                border: 1px solid #333;
            }
            .k-fils-field{
                width: 50px;
                height: 50px;
                border-bottom-right-radius: 8px;
                border-top-right-radius: 8px;
                border: 1px solid #333;
            }
            .k-b-border{
                border-bottom: 1px solid #333 !important;
            }
            .arabi-txt{
                text-align: right;
                /* float: right; */
            }
        </style>
    </head>
    <body>
        <div class="k-card-custom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="k-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-3">
                                        {{-- <h4 style="margin-bottom: 0; text-align:center;">{{ 'Printed BY: ' . Auth::user()->name .' - '. date("Y-m-d h:i:s a", time()) }}</h4> --}}
                                    </div>
                                    <div class="col-xs-6 align-self-center text-center">
                                        @if(isset($meta_data['report_name']))
                                            <h2>{{$meta_data['report_name']}}</h2>
                                        @endif
                                    </div>
                                </div>
                                @if (isset($footer_data))
                                <hr>
                                <div class="row">
                                    @foreach($footer_data as $key => $item)
                                    <div class="col-xs-4">
                                        <table class="table table-bordered mx-auto ">

                                                <tr>
                                                    <th>{!! $key !!}</th>
                                                    <td>{!! $item !!}</td>
                                                </tr>

                                        </table>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-xs-12">
                                        <table class="table table-bordered table-condensed table-striped">
                                            @foreach($data as $row)
                                                @if ($row == reset($data))
                                                    <tr>
                                                        @foreach($row as $key => $value)
                                                            <th>{!! $key !!}</th>
                                                        @endforeach
                                                    </tr>
                                                @endif
                                                <tr>
                                                    @foreach($row as $key => $value)
                                                        @if(is_string($value) || is_numeric($value))
                                                            <td>{!! $value !!}</td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
