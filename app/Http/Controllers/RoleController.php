<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RoleController extends CRUDController
{
    public function __construct() {
        parent::__construct("Role");
    }

    protected function validation($id = false) {
        return [
            'name' => 'required:max:255',
            'label' => 'required:max:255',
        ];
    }

    protected function data(Request $request) {
        return [
            'name' => $request->name,
            'label' => $request->label,
        ];
    }
}
