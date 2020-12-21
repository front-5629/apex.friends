<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'people_id',
        'headware',
        'mainpic',
        'secondpic',
        'thirdpic',
        'require_rank',
        'voice_chat',
        'message',
        'psid'
    ];
}
