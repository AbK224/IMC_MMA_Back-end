<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fighters extends Model
{
    protected $fillable =['first_name','last_name','age','weight_kg','height_cm'];
}
