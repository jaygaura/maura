<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = [
        'code',
        'year',
        'gdp_per_capita',
        'govt_debt',
    ];

    protected $hidden = [
        //
    ];

    protected $casts = [
        'code'           => 'string',
        'year'           => 'integer',
        'gdp_per_capita' => 'float',
        'govt_debt'      => 'float',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
