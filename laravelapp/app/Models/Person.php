<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'people';

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    public function clubs(){
        return $this->hasMany('App\Models\Club');
    }
}
