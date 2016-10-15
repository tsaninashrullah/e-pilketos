<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    protected $fillable = [
    	'users_id',
    	'candidiates_id'
    ];
}
