<?php

if (!function_exists('bool_val')) {
    function bool_val($bool) {
        $text = $bool?'true':'false';
        return $text;
    }
}

if (!function_exists('to_words')) {
    function to_words($string) {
        $words = explode('_', $string);
        return implode(' ', $words);
    }
}

if (!function_exists('activity_log')) {
    function activity_log($key, $object = []) {
        $stringObject = json_encode($object);
        \App\Activity::create([
            'user_id' => @auth()->user()->id,
            'key' => $key,
            'uri' => request()->getRequestUri(),
            'method' => request()->getMethod(),
            'user_agent' => request()->header('User-Agent'),
            'ip_address' => request()->ip(),
            'app_name' => config('app.name'),
            'data' => $stringObject,
        ]);
    }
}

if (!function_exists('objectsToArray')) {
    function objectsToArray($objects, $key = 'id') {
        $return = [];
        if (count($objects) > 0) {
            foreach ($objects as $o) {
                $return[] = $o->$key;
            }
        }
        return $return;
    }
}

if (!function_exists('objectsToArrayKeyValue')) {
    function objectsToArrayKeyValue($objects, $idKey, $valueKey) {
        $return = [];
        if (count($objects) > 0) {
            foreach ($objects as $o) {
                $return[$o->$idKey] = $o->$valueKey;
            }
        }
        return $return;
    }
}