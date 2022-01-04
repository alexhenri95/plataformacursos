<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getCompletedAttribute()
    {
        return $this->users->contains(auth()->user()->id);
    }

    public function section()
    {
    	return $this->belongsTo(Section::class);
    }

    public function platform()
    {
    	return $this->belongsTo(Platform::class);
    }

    public function description()
    {
    	return $this->hasOne(Description::class);
    }

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    //Relacion 1:1 polimorfica
    public function resource()
    {
        return $this->morphOne(Resource::class, 'resourceable');
    }

    //RELACION DE 1 A MUCHOS POLIMORFICAS
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}
