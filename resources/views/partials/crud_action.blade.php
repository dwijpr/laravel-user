<?php
    $crudActionFormID = "crud-action-form-{$object->id}";
?>

<div class="btn-group" role="group" aria-label="Action">
    <button
        type="submit"
        class="btn btn-danger"
        title="Delete"
        id="{{ $crudActionFormID }}-button"
        data-form="{{ $crudActionFormID }}"
    >
        <i class="fa fa-trash"></i>
    </button>
    <a href="{{ url('/user/'.$object->id) }}" class="btn btn-info">
        <i class="fa fa-edit"></i>
    </a>
</div>

{!! Form::open([
    'url' => 'dashboard/user/'.$object->id,
    'id' => $crudActionFormID,
    'method' => 'delete',
]) !!}
{!! Form::close() !!}

<script>
    $("#{{ $crudActionFormID }}-button").click(function(){
        var b = confirm("Are You sure?");
        if(b){
            var id = "#"+$(this).data('form');
            console.log(id);
            $(id).submit();
        }
    });
</script>