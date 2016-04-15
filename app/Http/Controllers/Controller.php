<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $this->_user = auth()->user();
    }

    protected function authorized($rule) {
        if (is_array($rule)) {
            if (
                count(
                    array_filter($rule, [$this, 'authorized'])
                ) > 0
            ) {
                return true;
            }
            return false;
        }else{
            if (
                !request()->user()
                || request()->user()->cannot($rule)
            ) {
                return false;
            }
            return true;
        }
    }
}
