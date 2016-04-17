<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Http\Requests;

class IndexController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function __construct() {
        if (!auth()->user()) {
            $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        }
    }

    public function index() {
        $objects = [
            'catatan-ku' => [
                'url' => 'blog',
                'title' => 'Catatan Ku',
                'icon' => 'pencil',
                'desc' => 'Semoga tulisan sederhana ini bisa menjadi pengingat'
                    .' tidak hanya untuk diriku sendiri, tapi juga bagi setiap'
                    .' orang yang membacanya.',
            ]
        ];
        return view('index', [
            'objects' => $objects,
        ]);
    }
}
