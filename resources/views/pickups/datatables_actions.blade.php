{!! Form::open(['route' => ['pickups.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('pickups.show', $id) }}" class='btn btn-outline-primary'>
        <i class="fa fa-eye"></i>
    </a>
    {!! Form::button('<i class="fas fa-trash text-danger"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-outline-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
