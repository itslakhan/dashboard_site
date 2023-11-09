<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membermodel extends Model
{
    use HasFactory;
    protected $table = 'membermodels';

    public function trainer(){
         return $this->belongsTo(trainermodel::class, );
    } 
}
