@extends('layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection

@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Bookings</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body mt-5 table-responsive bg-white py-4 rounded">
                <table id="myTable" class="border table">
                    <thead>
                        <tr>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Total Items</th>
                            <th>Total Weight</th>
                            <th>Courier</th>
                            <th>Price</th>
                            <th>Tracking Id</th>
                            <th>User Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($mybookings as $booking)
                            <tr>
                                <td>{{ $booking->origin_postal }}</td>
                                <td>{{ $booking->destination_postal }}</td>
                                <td>{{ $booking->total_items }}</td>
                                <td>{{ $booking->total_weight }}</td>
                                <td>{{ $booking->courier }}</td>
                                <td>{{ $booking->total_price }}</td>
                                <td>{{ $booking->tracking_codes }}</td>
                                <td>{{ $booking->user->email }}</td>
                                <td>
                                    <a href="{{ url($booking->uri) }}" target="_blank" class="btn btn-primary text-white"
                                        type="application/pdf">Label</a>
                                    <a href="#" class="btn btn-success text-white details-btn"
                                        data-details="{{ json_encode($booking->toArray()) }}">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <!-- Bootstrap Modal for Details -->
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Booking Details</h5>

                </div>
                <div class="modal-body">
                    <!-- Content will be dynamically added here using JavaScript -->
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable();

            // Handle click event for the "Details" button
            $('#myTable tbody').on('click', '.details-btn', function() {
                var detailsData = $(this).data('details');
                console.log(detailsData);
                var rowData = detailsData;

                // Update modal content
                var detailsContent = getBookingDetails(rowData);
                $('#detailsModal .modal-body').html(detailsContent);

                // Open the modal
                $('#detailsModal').modal('show');
            });

            function getBookingDetails(rowData) {
                // Customize this function based on your actual data structure

                var table = '<table class="table table-striped">';
                var rows = '';

                for (var key in rowData) {
                    // Exclude nested objects for simplicity
                    if (typeof rowData[key] !== 'object') {
                        var label = '<strong>' + key.replace(/_/g, ' ') + ':</strong>';
                        var value = rowData[key];
                        var row = '<tr><td>' + label + '</td><td>' + value + '</td></tr>';
                        rows += row;
                    }
                }

                table += rows + '</table>';

                return table;
            }


        });
    </script>
@endsection
