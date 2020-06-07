<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable=['name','message','email','phone', 'user_id', 'admin_id'];

}
