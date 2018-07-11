<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    /**
     * {@inheritDoc}
     */
    protected $fillable = array(
        'name',
      );


}
