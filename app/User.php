<?php

namespace App;

use App\Model\Category;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    static function GetUserByMail($email) {
        return  $userData = static::whereEmail($email)->first();

    }

    public function  roles()
    {
     return   $this->belongsToMany('App\Model\Role','role_users','user_id','role_id');
    }


    public function Country()
    {
        return $this->belongsToMany('App\Model\Country','tutor_profiles','user_id','country_id');
    }

    public function CountryEmployer()
    {
        return $this->belongsToMany('App\Model\Country','employer_profiles','user_id','country_id');
    }

    public function TutorProfile()
    {
        return $this->hasOne('App\Model\TutorProfile');
    }


    public function EmployerProfile()
    {
        return $this->hasOne('App\Model\EmployerProfile');
    }

    public function OrganisationsWork()
    {
        return $this->hasMany('App\Model\Organisations');
    }

    public function Categories()
    {
        return $this->belongsToMany('App\Model\Category')->withPivot(['qualified_levels_id']);
    }

    public function QualifiedLevel()
    {
//        return $this->belongsToMany('App\Model\QualifiedLevel');
        return $this->belongsToMany('App\Model\QualifiedLevel', 'category_user', 'user_id', 'qualified_levels_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Model\Category', 'sub_category_id');
    }

    public function children()
    {
        return $this->hasMany('App\Model\Category', 'sub_category_id');
    }
}
