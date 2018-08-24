<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Disciplines extends Model
{
    protected $table = 'disciplines';

    /**
     * {@inheritDoc}
     */
    protected $fillable = array(
        'name',
    );
}
