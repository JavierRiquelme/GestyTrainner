<?php

namespace App;

use App\Clase;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['title', 'image', 'descripcion'];

    public function clase(){
        return $this->hasMany(Clase::class);
    }
}
