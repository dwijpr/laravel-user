<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UserController extends Controller
{
    public function __construct() {

    }

    public function index() {
        $users = User::all();
        return view('objects.users.index', [
            'objects' => $users,
        ]);
    }

    public function create() {
        return view('objects.users.create');
    }

    public function store(Request $request) {
        $this->validate($request, $this->validation());
        User::create($this->data($request));
        return redirect('/dashboard/users');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect('/dashboard/users');
    }

    public function edit(User $user){
        return view('objects.users.edit', [
            'object' => $user,
        ]);
    }

    public function update(Request $request, User $user){
        $this->validate($request, $this->validation($user->id));
        $user->update($this->data($request));
        return redirect('/dashboard/users');
    }

    private function validation($id = false) {
        return [
            'name' => 'required:max:255',
            'email' => 'required|email|max:255|unique:users,email'
                .($id ? ",$id,id" : ''),
            'password' => 'required|min:6',
        ];
    }

    private function data(Request $request) {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
    }
}
