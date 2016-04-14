<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->authorize('view-dashboard', $this->_user);
    }

    public function index(){
        return view('dashboard.index');
    }
}
