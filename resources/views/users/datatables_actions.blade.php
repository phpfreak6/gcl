{!! Form::open(['route' => ['users.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('users.show', $id) }}" class='btn btn-outline-primary'>
        <i class="fa fa-eye"></i>
     </a>
    <a href="{{ route('users.edit',$id) }}"  class='btn btn-outline-info'>
        <i class="fas fa-pen"></i>
     </a>
    @if($id != 1)
        {!! Form::button('<i class="fas fa-trash text-danger"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-outline-danger',
            'onclick' => "return confirm('Are you sure?')"
        ]) !!}
    @endif
</div>
{!! Form::close() !!}
