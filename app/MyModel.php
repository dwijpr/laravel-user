<?php

namespace App;

trait MyModel {
    public static function listFields() {
        return [];
    }
    public static function toBeFilledFields() {
        return [];
    }
}