@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @include('objects.users.partials.form', [
                'url' => 'user/'.$object->id,
                'method' => 'patch',
                'submitLabel' => 'Update',
            ]);
        </div>
    </div>
</div>
@endsection
