@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
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
        </div>
    </div>
</div>
@endsection
