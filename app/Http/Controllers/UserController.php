<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UserController extends CRUDController
{
    use AuthTrait;

    protected $model = User::class;

    public function _init() {
        if (!$this->authorized('manage-users')) abort(403);
    }

    public function destroy($id) {
        if ($this->_user->hasHigherRolePriority($id))
            return parent::destroy($id);
        abort(403);
    }

    public function edit($id) {
        if ($this->_user->hasHigherRolePriority($id))
            return parent::edit($id);
        abort(403);
    }

    public function update($id) {
        if ($this->_user->hasHigherRolePriority($id))
            return parent::update($id);
        abort(403);
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

    protected function hasManyObjectsAvailable() {
        return \App\Role::where(
            'priority'
            , '>='
            , $this->_user->rolePriority()
        )->get();
    }
}
