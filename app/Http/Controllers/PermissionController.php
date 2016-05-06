<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Permission;

class PermissionController extends CRUDController
{
    use AuthTrait;

    protected $model = Permission::class;

    public function _init() {
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
