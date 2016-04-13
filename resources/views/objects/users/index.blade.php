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
                                <td>ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($objects as $object)
                                <tr>
                                    <td>{{ $object->id }}</td>
                                    <td>{{ $object->name }}</td>
                                    <td>{{ $object->email }}</td>
                                    <td>
                                        @include('partials.crud_action')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h2>No User Found!</h2>
            @endif
            <div>
                <a
                    class="btn btn-lg btn-primary"
                    href="{{ url('dashboard/user') }}"
                >
                    <i class="fa fa-btn fa-plus"></i>
                    Create New User
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
