@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Dashboard</h1>
            <hr>
            <div class="row">
                <div class="col-md-4 text-center">
                    <a
                        class="btn btn-lg btn-default"
                        href="{{ url('dashboard/users') }}"
                    >
                        <i class="fa fa-btn fa-users"></i>
                        Users
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
