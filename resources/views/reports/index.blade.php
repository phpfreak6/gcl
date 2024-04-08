@extends('layouts.master')

@section('content')
<main id="main" class="main">
    <section class="section dashboard">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Reports</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Reports</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            @include('flash::message')
            <div class="card card-primary card-outline">
                <!-- <div class="card-header">
                    <h3 class="card-title">Reports Detail</h3>
                </div> -->
                <div class="card-body table-responsive">
                    <!-- <select id="period-select">
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option selected value="yearly">Yearly</option>
                    </select> -->

                    <div class="card-header">
                        <h3 class="card-title">Courier</h3>
                    </div>
                    <div style="width:100%;max-width:600px">
                        <canvas id="courier"></canvas>
                    </div>
                </div>
                <div class="card-body table-responsive">

                    <div class="card-header">
                        <h3 class="card-title">Courier Services</h3>
                    </div>
                    <div style="width:100%;max-width:600px">
                        <canvas id="courier_service"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
    // Function to destroy existing Chart instance
    function destroyChart(chartId) {
        if (window.myCharts[chartId] !== undefined) {
            window.myCharts[chartId].destroy();
        }
    }

    // Global object to hold Chart instances
    window.myCharts = {};
    getPieChart(<?= $courier['chart_data']; ?>, 'courier', 'Courier');
    getPieChart(<?= $courier_service['chart_data']; ?>, 'courier_service', 'Courier Services');

    function getPieChart(data, divId, title) {

        var cData = data;

        var xValues = cData.label;
        var yValues = cData.data;

        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        // Destroy existing chart if it exists
        destroyChart(divId);

        // Create new Chart instance
        window.myCharts[divId] = new Chart(divId, {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: title
                }
            }
        });
    }
</script>

<script>
    function updateChartData(period) {
        $.ajax({
            url: "/reports/change/" + period,
            success: function(data) {

                var courierData = JSON.parse(data.courier.chart_data);
                var courierServiceData = JSON.parse(data.courier_service.chart_data);

                if(courierData.label != ''){

                    getPieChart(courierData, 'courier', 'Courier');
                }

                if(courierServiceData.label != ''){
                getPieChart(courierServiceData, 'courier_service', 'Courier Services');
                }

            }
        });
    }

    // Function to handle time period change
    $('#period-select').change(function() {
        var period = $(this).val();
        updateChartData(period);
    });
</script>

@endsection