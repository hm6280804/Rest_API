<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserNi extends Model
{
    //
    protected $table = 'user_ni';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
