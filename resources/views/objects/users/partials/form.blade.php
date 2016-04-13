{!! Form::open([
    'url' => 'dashboard/'.(@$url?:'user'),
    'method' => @$method?:'post',
    'class' => 'form-horizontal',
    'role' => 'form',
]) !!}
    @include('partials.div_form_group', [
        'name' => 'name',
        'label' => 'Name',
        'value' => @$object->name,
    ])
    @include('partials.div_form_group', [
        'name' => 'email',
        'label' => 'E-Mail Address',
        'value' => @$object->email,
    ])
    @include('partials.div_form_group', [
        'name' => 'password',
        'label' => 'Password',
        'type' => 'password',
    ])
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i>
                {{ @$submitLabel?:'Create' }}
            </button>
        </div>
    </div>
{!! Form::close() !!}
