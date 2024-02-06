<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'g_admin',
        'g_moderator',
        'g_name',
        'g_target',
        'g_stack',
    ];
}
