<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use MyModel;

    protected $fillable = [
        'name', 'label',
    ];

    public function permissions() {
        return $this->belongsToMany(Permission::class);
    }

    public function assign($permission) {
        if(is_array($permission)){
            foreach ($permission as $_p) {
                $this->_assign($_p);
            }
        }else{
            return $this->_assign($permission);
        }
    }

    private function _assign(Permission $permission) {
        return $this->permissions()->save($permission);
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
