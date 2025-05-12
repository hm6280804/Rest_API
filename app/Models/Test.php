<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    protected $guarded = [];
    protected $casts = [
        'meta_data' => 'json'
    ];
}
