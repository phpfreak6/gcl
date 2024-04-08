@if(isset($model) && count( $model->getMedia()))
    <div class="col-md-{{ isset($column) ? $column : '5' }}">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <p class="text-center"> <b>Files</b></p>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table" width="100%">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Attachment</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="fileBody">
                                @foreach ($model->getMedia() as $key => $item)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td><a href="{{ $item->getFullUrl() }}" download >{{ $item->file_name }}</a></td>
                                        <td>
                                            @can('media')
                                                <a class="text-danger" href="{{ route('media.delete_file', $item->id) }}" onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash "></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
