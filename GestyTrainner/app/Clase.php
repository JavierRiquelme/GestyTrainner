<?php

namespace App;

use App\Category;
use App\PostComment;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable=['title', 'category_id', 'descripcion', 'color', 'textcolor', 'start', 'end', 'hora', 'posted', 'image', 'precio', 'user_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        return $this->hasMany(PostComment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
