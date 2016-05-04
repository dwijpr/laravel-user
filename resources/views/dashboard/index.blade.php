<?php
    $objects = [
        'users' => [
            'icon' => 'users',
            'label' => 'Users',
            'url' => 'dashboard/users',
            'permission' => 'manage-users',
            'desc' => 'Manage Users',
        ],
        'roles' => [
            'icon' => 'user-secret',
            'label' => 'Roles',
            'url' => 'dashboard/roles',
            'permission' => 'manage-roles',
            'desc' => 'Manage Roles',
        ],
        'permissions' => [
            'icon' => 'map-signs',
            'label' => 'Permissions',
            'url' => 'dashboard/permissions',
            'permission' => 'manage-permissions',
            'desc' => 'Manage Permissions',
        ],
        'activities' => [
            'icon' => 'history',
            'label' => 'Activities',
            'url' => 'dashboard/activities',
            'permission' => 'manage-users',
            'desc' => 'Viewing activiy logs',
        ],
    ];
?>

@extends('layouts.app')


@section('styles')
    
    @parent

    <style>
        .media .media-icon{
            width: 64px;
            height: 64px;
            text-align: center;
        }
        .media i.fa{
            font-size: 48px;
        }
    </style>

@endsection


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
                                @include ('dashboard.index.item')
                            </div>
                        @endcan
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
