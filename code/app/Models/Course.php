<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'title',
    ];

    protected $hidden = [
        //
    ];

    protected $casts = [
        'title' => 'string',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
