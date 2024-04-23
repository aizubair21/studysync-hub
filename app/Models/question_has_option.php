<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question_has_option extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'type', //text, image
        'question',
        'option',
        'is_correct', //bool
    ];
}
