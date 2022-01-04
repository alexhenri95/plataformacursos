<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lesson()
    {
    	//rELACION 1 : 1 iNVERSA
    	return $this->belongsTo(Lesson::class);
    }
}
