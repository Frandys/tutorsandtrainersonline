<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryUser extends Model
{
    protected $table = 'category_user';
    protected $fillable = ['user_id', 'category_id', 'qualified_levels_id'];
    protected $guarded = array('id');


}
