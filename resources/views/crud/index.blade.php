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
                                    @foreach (
                                        $class::listFields() as $key => $field
                                    )
                                        <th>
                                            @if (!is_numeric($key))
                                                {{ ucwords($key) }}
                                            @else
                                                {{ ucwords(to_words($field)) }}
                                            @endif
                                        </th>
                                    @endforeach
                                    @if (!$classAttrs->viewOnly)
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($objects as $object)
                                    <tr>
                                        @foreach (
                                            $class::listFields()
                                            as $key => $field
                                        )
                                            <td>
                                                @include ('crud.partials.field')
                                            </td>
                                        @endforeach
                                        @if (!$classAttrs->viewOnly)
                                            <td>
                                                @include(
                                                    $classAttrs->actionViewPath
                                                )
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <h2>No {{ $classAttrs->single }} Found!</h2>
                @endif
                @if (!$classAttrs->viewOnly)
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
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                {{ $objects->links() }}
            </div>
        </div>
    </div>

@endsection
