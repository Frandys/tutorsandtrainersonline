<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class TutorProfile extends Model
{
    protected $table = 'tutor_profiles';

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

    public function user(){

        return $this->belongsTo('App\User');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Country()
    {
        return $this->belongsTo('App\Model\Country');
    }
}
