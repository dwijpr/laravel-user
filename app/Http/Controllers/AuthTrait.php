<?php

namespace App\Http\Controllers;

trait AuthTrait{
    protected function init() {
        if (!auth()->user()) {
            $this->middleware('auth');
        } else {
            $this->_init();
        }
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