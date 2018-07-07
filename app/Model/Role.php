<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * {@inheritDoc}
     */
    protected $table = 'roles';

    /**
     * {@inheritDoc}
     */
    protected $fillable = array(
        'slug',
        'name',
        'permissions',

    );

    public function  users(){

        return $this->belongsToMany('App\User');
//        return   $this->hasMany('App\Model\RoleUsers','role_id');
    }
}
