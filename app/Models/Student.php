<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'my_table_one';
    protected $primaryKey = "student_id";

    public $timestamps = false;

    protected $attributes = [
        'city' => 'Seri Behlol'
 
   ];
   protected $guarded= [];

   public function contact(){
    return $this->hasOne(Contact::class,'student_id', 'student_id');
   }

   public function book(){
    return $this->hasMany(Book::class,'student_id', 'student_id');
   }
}
