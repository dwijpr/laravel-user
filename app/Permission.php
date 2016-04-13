<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use MyModel;

    protected $fillable = [
        'name', 'label',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    /*
     * MyModel Trait
     */

    public static function listFields() {
        return [
            'id', 'name', 'label'
        ];
    }
    
    public static function toBeFilledFields() {
        return [
            'name' => 'text',
            'label' => 'text',
        ];
    }
}
