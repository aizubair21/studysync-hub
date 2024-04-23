<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anttandane_has_response extends Model
{
    use HasFactory;

    protected $fillable  =
    [
        'attandance',
        'question',
        'vendor',
        'answer',
        'is_correct',
        'mark',
        'type',
        'file',
    ];


    //relation with question
    public function question()
    {
        return $this->belongsTo(exam_has_attandance::class, "attandance", "id");
    }
}
