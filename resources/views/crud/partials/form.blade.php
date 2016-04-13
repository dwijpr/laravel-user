{!! Form::open([
    'url' => $classAttrs->backend.(@$url?:$classAttrs->single),
    'method' => @$method?:'post',
    'class' => 'form-horizontal',
    'role' => 'form',
]) !!}
    
    @foreach ($class::toBeFilledFields() as $field => $value)
        <?php
            $data = [
                'name' => $field,
                'label' => ucwords($field),
            ];
            switch ($value) {
                case 'password':
                    $data['type'] = 'password';
                    break;
                default:
                    $data['value'] = @$object->{$field};
                    break;
            }
        ?>
        @include('partials.div_form_group', $data)
    @endforeach

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i>
                {{ @$submitLabel?:'Create' }}
            </button>
        </div>
    </div>
{!! Form::close() !!}
