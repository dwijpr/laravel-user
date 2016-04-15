<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends CRUDController
{
    public function __construct() {
        parent::__construct("User");
        if (!$this->authorized('manage-users')) abort(403);
    }

    protected function validation($id = false) {
        return [
            'name' => 'required:max:255',
            'email' => 'required|email|max:255|unique:users,email'
                .($id ? ",$id,id" : ''),
            'password' => 'required|min:6',
        ];
    }

    protected function data() {
        return [
            'name' => request()->name,
            'email' => request()->email,
            'password' => bcrypt(request()->password),
        ];
    }

    protected function hasManyObjects() {
        return "Role";
    }
}
