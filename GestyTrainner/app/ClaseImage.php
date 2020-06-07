<?php/*

namespace App;

use App\Clase;
use Illuminate\Database\Eloquent\Model;

class ClaseImage extends Model
{
    protected $fillable=['clase_id', 'image'];

    public function clase(){
        return $this->belongsTo(Clase::class);
    }
}
