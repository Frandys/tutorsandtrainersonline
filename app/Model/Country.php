<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    /**
     * {@inheritDoc}
     */
    protected $fillable = array(
        'name',
    );

//    public function TutorProfile()
//    {
//        return $this->hasOne('App\Model\TutorProfile');
//    }
}
