<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    protected function afterLoginCheck(){
        if (!$this->authorized([
            'manage-users',
            'manage-roles',
            'manage-permissions',
        ])) {
            abort(403);
        }
    }

    public function index(){
        return view('dashboard.index');
    }
}
