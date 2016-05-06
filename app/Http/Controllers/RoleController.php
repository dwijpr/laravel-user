<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Role;

class RoleController extends CRUDController
{
    use AuthTrait;

    protected $model = Role::class;

    public function _init() {
        if (!$this->authorized('manage-roles')) abort(403);
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
            'permissions' => request()->permissions,
        ];
    }

    protected function hasManyObjects() {
        return "Permission";
    }
}
