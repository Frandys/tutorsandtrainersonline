<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class TutorProfile extends Model
{
    protected $table = 'tutor_profiles';
    protected $primaryKey = 'user_id';
    /**
     * {@inheritDoc}
     */
    protected $fillable = array(
        'user_id',
        'address',
        'city',
        'state',
        'country_id',
        'language_id',
        'skill_id',
        'specialization_id',
        'discipline_id',
        'course_id',
        'certification_id',
        'about',
        'resume',
    );

    public function User()
    {
     return $this->belongsTo('App\User');
    }

    public function Categories()
    {
          return $this->belongsToMany('App\Model\Category', 'category_user', 'user_id', 'category_id');
    }

    public function QualifiedLevel()
    {
//        return $this->belongsToMany('App\Model\QualifiedLevel');
        return $this->belongsToMany('App\Model\QualifiedLevel', 'category_user', 'user_id', 'qualified_levels_id');
    }

    public function Disciplines()
    {
//      return $this->belongsToMany('App\Model\Disciplines', 'tutor_profiles', 'user_id', 'discipline_id');
        return $this->hasOne('App\Model\Disciplines','id','discipline_id');
    }

    public function Country()
    {
         return $this->hasOne('App\Model\Country','id','discipline_id');
    }




}
