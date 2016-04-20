<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
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
