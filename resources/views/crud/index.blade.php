@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if (count($objects) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    @foreach ($class::$tableFields as $field)
                                        <td>{{ $field }}</td>
                                    @endforeach
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($objects as $object)
                                    <tr>
                                        @foreach (
                                            $class::$tableFields as $field
                                        )
                                            <td>{{ $object->$field }}</td>
                                        @endforeach
                                        <td>
                                            @include('partials.crud_action')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <h2>No {{ $classAttrs->single }} Found!</h2>
                @endif
                <div>
                    <a
                        class="btn btn-lg btn-primary"
                        href="{{ url(
                            $classAttrs->backend.$classAttrs->single
                        ) }}"
                    >
                        <i class="fa fa-btn fa-plus"></i>
                        Create New {{ $classAttrs->single }}
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
