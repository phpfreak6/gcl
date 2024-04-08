<div class="row p-2">
    <div class="col-md-12">
        <div class="form-group">
            <button type="button" id="addRowService" class="btn btn-info btn-sm">Add File</button>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table mb-0" width="100%">
            <tbody id="fileBody"></tbody>
        </table>
    </div>
</div>
@section('scripts')
@parent
    <script type="text/javascript">
       $('#addRowService').click(function (){
            $('#fileBody').append(`
            <tr>
                <td>
                    <input type="text" name="file_name[]" class="form-control" placeholder="File Name...." />
                </td>
                <td>
                    <div class="custom-file">
                        <input type="file" name="file_attachment[]" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn btn-danger float-right deleteBtn"><i  title="Delete" data-toggle="tooltip" class="fa fa-trash"></i></button>
                </td>
            </tr>`);
        });
        $('#fileBody').on('click','.deleteBtn', function () {
            $(this).closest("tr").remove();
        });
    </script>
@endsection
