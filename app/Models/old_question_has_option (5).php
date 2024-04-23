<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'vendor',
        'info',
        'status',
        'is_private',
        'banned_on',
        'image_url',
    ];
}
