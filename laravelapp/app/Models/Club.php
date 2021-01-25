<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $table = 'clubs';

    protected $fillable = [
        'people_id',
        'clubs_name',
        'clubs_member',
        'clubs_headware',
        'require_rank',
        'message',
        'voice_chat'
    ];
}
