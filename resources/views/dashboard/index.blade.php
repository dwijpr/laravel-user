@extends('layouts.app')

<?php
    $objects = [
        'users' => [
            'icon' => 'users',
            'label' => 'Users',
            'url' => 'dashboard/users',
        ],
        'roles' => [
            'icon' => 'user-secret',
            'label' => 'Roles',
            'url' => 'dashboard/roles',
        ],
        'permissions' => [
            'icon' => 'map-signs',
            'label' => 'Permissions',
            'url' => 'dashboard/permissions',
        ],
    ];
?>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Dashboard</h1>
            <hr>
            <div class="row">
                @foreach ($objects as $object)
                    <div class="col-md-4">
                        <a
                            class="btn btn-lg btn-default"
                            href="{{ url($object['url']) }}"
                        >
                            <i class="fa fa-btn fa-{{ $object['icon'] }}"></i>
                            {{ $object['label'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
