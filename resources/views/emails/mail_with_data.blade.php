<table class="table table-striped">
    @foreach($data as $key => $item)
        <tr>
            <td><strong>{{ ucwords($key) }}</strong></td>
            <td>{{ $item }}</td>
        </tr>
    @endforeach
</table>
