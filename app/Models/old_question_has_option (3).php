<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class exam_has_attandance extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'exam_id',
        'vendor',
        'e_id', //examine id
        'total_mark',
        'c',
        'w',
        's',
        'is_retake', //false, if retake done than true
        'retake_on', //nullable. if needed to retake, then give a date
        'is_reviewed', // false. if review done then true
        'review_on', //nullable, if need to take review then give a date. examineer take a review then publish to all 
        'is_open', //date -> open to review the student
        'token_id', //unique token to access this attandance data
        'is_rejected_by_applicant', //text of reason why applicalt reject/not attend to exam
    ];

    /**
     * fild should be casting
     */
    // protected $cast =
    // [
    //     "submit_on" => "datetime",
    // ];


    /**
     * eloquest relationship with user. 
     * who take this exam
     */
    public function student()
    {
        return $this->hasOne(User::class, "e_id", "id");
    }

    /**
     * fild should be instead of accessor attrubute
     */
    // protected function getUserIdAttribute($value)
    // {
    //     return DB::table('users')->where("id", $value)->select(["id", "name"])->get();
    // }

    // protected function getExamIdAttribute($value)
    // {
    //     return DB::table("exam")->where("id", $value)->select(["id", "exm_name", "exm_subject", "for_cr", "for_wr", "for_skp"]);
    // }
}
