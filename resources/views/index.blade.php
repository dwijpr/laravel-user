@extends('layouts.app')


@section('styles')

    @parent

    <style>
        .media .fa{
            font-size: 48px;
        }
    </style>

@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="text-right"></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            @foreach ($objects as $object)
                @include('partials.media')
            @endforeach
        </div>
    </div>
</div>
@endsection
