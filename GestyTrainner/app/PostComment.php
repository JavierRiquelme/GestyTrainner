<?php

namespace App;

use App\User;
use App\Clase;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $fillable = ['title', 'message', 'clase_id', 'user_id', 'approved'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function clase(){
    	return $this->belongsTo(Clase::class);
    }
}
