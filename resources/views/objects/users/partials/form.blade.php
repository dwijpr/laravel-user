{!! Form::open([
    'url' => 'user',
    'method' => 'post',
    'class' => 'form-horizontal',
    'role' => 'form',
]) !!}
    @include('partials.div_form_group', [
        'name' => 'name',
        'label' => 'Name',
    ])
    @include('partials.div_form_group', [
        'name' => 'email',
        'label' => 'E-Mail Address',
    ])
    @include('partials.div_form_group', [
        'name' => 'password',
        'label' => 'Password',
        'input' => [ 'type' => 'password' ],
    ])
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i>Create
            </button>
        </div>
    </div>
{!! Form::close() !!}
