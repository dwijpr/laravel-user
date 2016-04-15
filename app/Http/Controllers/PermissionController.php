<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PermissionController extends CRUDController
{
    public function __construct() {
        parent::__construct("Permission");
        if (!$this->authorized('manage-permissions')) abort(403);
    }

    public function create() {
        abort(403);
    }

    public function store() {
        abort(403);
    }

    public function destroy($id) {
        abort(403);
    }

    public function edit($id) {
        abort(403);
    }

    public function update($id) {
        abort(403);
    }

    protected function validation($id = false) {
        return [
            'name' => 'required:max:255',
            'label' => 'required:max:255',
        ];
    }

    protected function data() {
        return [
            'name' => request()->name,
            'label' => request()->label,
        ];
    }
}
