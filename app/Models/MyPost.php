<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyPost extends Model
{
    protected $fillable = [
        'title', 'description', 'image'
    ];
}
