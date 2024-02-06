<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        "g_id",
        'm_id',
        'exm_type',
        'exm_name',
        'exm_subject',
        'exm_start',
        'exm_end',
        'exm_date',
        'exm_duration',
        'for_cr',
        'for_wr',
        'for_skp',
        'is_published',
        'antrance_id',
        'status'
    ];

    // public function antrance()
    // {
    //     return $this->belongsTo(Antrance::class, "antrance_id");
    // }
    // public static function getExams($request)

}
