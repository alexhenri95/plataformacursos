<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    protected $guarded = ['id','status'];
    protected $withCount = ['students', 'reviews'];


    public function getRatingAttribute()
    {
        if ($this->reviews_count) {
            return round($this->reviews->avg('rating'), 1);
        }else{
            return 5;
        }
    }

    //Query scopes
    public function scopeCategory($query, $category_id)
    {
        if ($category_id) {
            return $query->where('category_id', $category_id);
        }
    }

    public function scopeLevel($query, $level_id)
    {
        if ($level_id) {
            return $query->where('level_id', $level_id);
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //RELACION 1 : MUCHOS INVERSA
    public function teacher()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function students()
    {
    	return $this->belongsToMany(User::class);
    }

    //Relacion 1 : muchos
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    //Relacion 1 : muchos inversa
    public function level()
    {
    	return $this->belongsTo(Level::class);
    }

    //Relacion 1 : muchos inversa
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    //Relacion 1 : muchos inversa
    public function price()
    {
    	return $this->belongsTo(Price::class);
    }

    //Relacion de 1 a  muchos
    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    //Relacion de 1 a  muchos
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    //Relacion de 1 a  muchos
    public function audience()
    {
        return $this->hasMany(Audience::class);
    }

    //Relacion de 1 a  muchos
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    //Relacion 1 a 1 polimorfica
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    //
    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Section::class);
    }

    public function observation()
    {
        return $this->hasOne(Observation::class);
    }
}
