<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserJobs extends Model
{


    public function userJobs()
    {
        return $this->belongsTo('App\Model\Jobs', 'job_id', 'id');
    }

}
