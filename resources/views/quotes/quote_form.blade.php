<form id="quoteForm">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="postal">Deliver to:</label>
                <select class="form-control {{ $errors->has('country')?'is-invalid':'' }}" name="country">
                    <option selected disabled>Select country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->code }}">
                            {{ $country->name }} - {{ $country->code }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="postal">Postal:</label>
                <input type="text" class="form-control" value="" name="postal" placeholder="Postal">
            </div>
        </div>
    </div>
    <hr>
    <div id="rowContainer">
        <div class="dynamicrow">
            <div class="row">
                <div class="col">
                    <label for="dim_length">Dimension Length:</label>
                    <input type="text" name="dim_length[]" value="10" class="form-control" required>
                </div>
                <div class="col">
                    <label for="dim_width">Dimension Width:</label>
                    <input type="text" name="dim_width[]" value="10" class="form-control" required>
                </div>
                <div class="col">
                    <label for="dim_height">Dimension Height:</label>
                    <input type="text" name="dim_height[]" value="10" class="form-control" required>
                </div>
                <div class="col">
                    <label for="dim_unit">Dimension Unit:</label>
                    <input type="text" name="dim_unit[]" class="form-control" readonly value="cm" required>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <label for="unit_weight">Weight:</label>
                    <input type="text" name="unit_weight[]" value="1" class="form-control" required>
                </div>
                <div class="col-3">
                    <label for="weight_unit">Unit:</label>
                    <input type="text" name="weight_unit[]" value="kg" class="form-control" required>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group col-sm-12">
            <button type="button" class="btn btn-secondary" id="addRow">Add Row</button>
            <button type="button" class="btn btn-primary" id="getQuote">Get Quote</button>
        </div>
    </div>
    <table class="table" id="quoteTable">
        <thead>
            <tr>
                <th>Carrier</th>
                <th>Service</th>
                <th>Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="quoteTableBody">
            <!-- Quotes will be dynamically added here -->
        </tbody>
    </table>
    <div id="addressFields" style="display: none;">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Ship to</h3>
            </div>
            <div class="card-body table-responsive" >
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="shipt_to_collection_date">Collection Date:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" name="shipt_to_collection_date" class="form-control datepicker" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="shipt_to_collection_time">Collection Time:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" name="shipt_to_collection_time" class="form-control timepicker" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ship_to_company_name">Company Name:</label>
                            <input type="text" name="ship_to_company_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="dim_length">Name:</label>
                            <input type="text" name="ship_to_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="dim_width">Phone:</label>
                            <input type="text" name="ship_to_phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ship_to_email">Email:</label>
                            <input type="text" name="ship_to_email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ship_to_address_1">Address 1:</label>
                            <input type="text" name="ship_to_address_1" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ship_to_address_2">Address 2:</label>
                            <input type="text" name="ship_to_address_2" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ship_to_city">City:</label>
                            <input type="text" name="ship_to_city" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ship_to_reference">Reference:</label>
                            <input type="text" name="ship_to_reference" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="delivery_instructions">Delivery Instructions:</label>
                            <input type="text" name="delivery_instructions" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary" id="generate_label">Generate Label</button>
                <input type="hidden" name="preset_id">
                <input type="hidden" name="courier">
            </div>
        </div>
    </div>
</form>
<!-- Generated Label -->
<div id="generatedLabel" style="display: none;">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Generated Label</h3>
        </div>
        <div class="card-body table-responsive" >
            <a href="#" target="_blank" class="btn btn-outline-primary view-label"> View Label | <i class="fas fa-download"></i></a>
        </div>
    </div>
</div>
@section('scripts')
@include('quotes.quote_api_script')

<script>
    $(function() {
        $('#addRow').click(function() {
            var newRow = `
                <div class="dynamicrow">
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label for="dim_length">Dimension Length:</label>
                            <input type="text" name="dim_length[]" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="dim_width">Dimension Width:</label>
                            <input type="text" name="dim_width[]" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="dim_height">Dimension Height:</label>
                            <input type="text" name="dim_height[]" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="dim_unit">Dimension Unit:</label>
                            <input type="text" name="dim_unit[]" class="form-control" readonly value="cm" placeholder="cm" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <label for="unit_weight">Weight:</label>
                            <input type="text" name="unit_weight[]" class="form-control" required>
                        </div>
                        <div class="col-3">
                            <label for="weight_unit">Unit:</label>
                            <input type="text" name="weight_unit[]" class="form-control" required>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-secondary mt-4 removeRow">Remove</button>
                        </div>
                    </div>
                </div>
                `;

            $('#rowContainer').append(newRow);
        });

        $(document).on('click', '.removeRow', function() {
            $(this).closest(".dynamicrow").remove();

        });
    });
</script>
@endsection
