<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use MyModel;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role){
        if(is_string($role)){
            return $this->roles->contains('name', $role);
        }
        return !! $role->intersect($this->roles)->count();
    }

    public function assign($role){
        return $this->roles()->save(
            is_string($role)?
            Role::whereName($role)->firstOrFail()
            :$role
        );
    }

    /*
     * MyModel Trait
     */

    public static function listFields() {
        return [
            'id', 'name', 'email',
        ];
    }

    public static function toBeFilledFields(){
        return [
            'name' => 'text',
            'email' => 'text',
            'password' => 'password',
        ];
    }
}
