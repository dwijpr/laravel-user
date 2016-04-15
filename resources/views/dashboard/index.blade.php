@extends('layouts.app')

<?php
    $objects = [
        'users' => [
            'icon' => 'users',
            'label' => 'Users',
            'url' => 'dashboard/users',
            'permission' => 'manage-users',
        ],
        'roles' => [
            'icon' => 'user-secret',
            'label' => 'Roles',
            'url' => 'dashboard/roles',
            'permission' => 'manage-roles',
        ],
        'permissions' => [
            'icon' => 'map-signs',
            'label' => 'Permissions',
            'url' => 'dashboard/permissions',
            'permission' => 'manage-permissions',
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
                    @can ($object['permission'])
                        <div class="col-md-4">
                            <a
                                class="btn btn-lg btn-default"
                                href="{{ url($object['url']) }}"
                            >
                                <i class="fa fa-btn fa-{{ $object['icon'] }}"></i>
                                {{ $object['label'] }}
                            </a>
                        </div>
                    @endcan
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
