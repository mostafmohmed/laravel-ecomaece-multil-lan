<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'id','userr_id','price','total-price','protect_name','qua'
    ];
    public function protect(){

       
            return $this->hasMany(Produect::class,'produect_id');
        

    }
    use HasFactory;
}
