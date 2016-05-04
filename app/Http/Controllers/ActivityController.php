<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ActivityController extends CRUDController
{
    use AuthTrait;

    protected $viewOnly = true;

    public function __construct() {
        parent::__construct("Activity");
    }

    public function _init() {
        if (!$this->authorized('manage-users')) abort(403);
    }

    protected function validation($id = false) {
        return [];
    }

    protected function data() {
        return [];
    }
}
