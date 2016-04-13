<?php

namespace App;

trait MyModel {
    abstract static function listFields();
    abstract static function toBeFilledFields();
}