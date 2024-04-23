<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam_has_question extends Model
{
    use HasFactory;

    protected $fillable =
    [
        "exam_id",
        "vendor",
        "type", //textOnly, written, voice, attach, withImage, withVideo, imageOnly, videoOnly
        "answer_type", //mcq, write, attached
        "question",
        "has_option",
        "has_file", //audio, image, video
        "file",
        "is_info_and_tags_show", //bool
        "tags",
        "info",
        "status",
    ];



    /**
     * relations
     */
    public function options()
    {
        return $this->hasMany(question_has_option::class, 'question');
    }

    public function question()
    {
        return $this->belongsTo(exam_has_question::class);
    }
    
}
