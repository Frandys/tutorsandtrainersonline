<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    public function Tutor()
    {
        return $this->hasOne('App\User','id','tutor_id');
    }

    public function Employer()
    {
        return $this->hasOne('App\User','id','employer_id');
    }

    public function Categories()
    {
        return $this->hasOne('App\Model\Category','id','categories_id');
    }

    public function QualifiedLevels()
    {
        return $this->hasOne('App\Model\QualifiedLevel','id','qualified_levels_id');
    }
}
