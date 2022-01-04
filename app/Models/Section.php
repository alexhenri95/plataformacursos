<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    //Relacion de 1 a muchos inversa
    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    //Relacion 1 a muchos
    public function lessons()
    {
    	return $this->hasMany(Lesson::class);
    }


}
