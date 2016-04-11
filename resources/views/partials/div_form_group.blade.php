<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">{{$label}}</label>

    <div class="col-md-6">
        <input
            type="{{ @$input['type']?:'text' }}"
            class="form-control" name="{{$name}}" value="{{ old($name) }}">

        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>
