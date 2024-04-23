<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models[user, ];
use App\Models\{User, Group, exam_has_attandance};
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class group_has_exam extends Model
{
    use HasFactory;


    protected $fillable = [
        "group",
        'vendor',
        'exm_type',
        'exm_type_of',
        'exm_function',
        'exm_name',
        'exm_subject',
        'exm_key_note',
        'is_retake', //when make schedule for retake exam
        'isLinkOpen', //
        'link_open_at',
        'link_close_at',
        'can_attend_until', //when exa
        'isResultPublished',
        'result_published_on',
        'exm_date',
        'exm_duration',
        'for_cr', //for correct mark
        'for_wr', //for incorrect mark
        'for_skp', //for skipp question
        'pass_mark', //define a minimal pass mark
        'status', // 0 -> draft, 2 -> published to all member
        'total_mark', //how many question have this exam. system fill this after all qestion been added.
        'total_question', //same as abov
        'Is_prevent_change_option', //alwaya true
        'ransomized_question',
        'mouse_track',
        'window_track',
        'have_moderate',
        'have_moderable_question',
        'is_moderated', //
        'attend_endpoint', //custom generatd to target exam
        'is_avaiable_to_other', //if one user can see other users exams response
        //'is_published',

    ];

    //get which user has attend to this exams. Get from antrance table
    // public function attandanve()
    // {
    //     return $this->belongsTo(exam_has_attendance::class, "antrance_id");
    // }

    //get the author user of this exams schedlre
    public function admin()
    {
        return $this->belongsTo(User::class, 'vendor", id');
    }

    //question of this exams schedule
    public function questions()
    {
        return $this->hasMany(exam_has_question::class, 'exam_id', "id");
    }


    //this make query all with with() method by default
    // public function getWithRelationsAttribute()
    // {
    //     $this->load('courses.courseModules.contents',);
    //     return $this;
    // }


    /**
     * in my exam table, group comes with group id from group table. 
     * Here i wanna find group from group table and replace with group id
     * to do this we use accessor class,
     */
    protected function getGroupAttribute($value)
    {
        $group = array();
        $group["id"] = $value;
        $group["name"] =  DB::table("groups")->where("id", $value)->value("name");
        return $group;
    }

    /**
     * for status
     * show to human readiable formate, instead of database  value
     */
    protected function getStatusAttribute($value)
    {
        switch ($value) {
            case '0':
                # code...
                return "Draft";
                break;

            case "1":
                return  "opened";
                break;

            case "5":
                return "finished";
                break;

            case "2":
                return "Published";
                break;

            default:
                return "update failed";
                # code...
                break;
        }
    }

    /**
     * Attrubute for moderator 
     */
    protected function getMIdAttribute($mId)
    {
        return $this->belongsToMany(User::class, "exam_has_moderator");
    }


    // here creatd_at  is a custom attribute that returns the created at date in human readable format.
    // but, my database  column name for this field is "created_at" not "createdAtt". so i used accessor
    /**
     * ACCESSOR
     * Get the value of `created_at` as a Carbon instance.
     */
    public function getCreatedAtAttribute($date): string
    {
        return Carbon::parse($date)->format("M d, Y");
        // Carbon 
    }
    public function getUpdatedAtAttribute($date): string
    {
        return Carbon::parse($date)->format("M d, Y");
    }
    public function getExmDateAttribute($date): string
    {
        $carbon = new Carbon($date);
        if ($carbon < now()) {
            return "Experied on, " . $carbon->format('M d, Y');
        } elseif ($carbon->diffInDays(now(), false) == 0) {
            return 'Today';
        } elseif ($carbon->diffInDays(now(), false) > 0 && $carbon->diffInDays(now(), true) <= 7) {
            return 'This Week';
        } else {
            return $carbon->format('F jS');
        }
    }




    /**
     * Delete a exam schedule
     * @param  int $id
     */

    public function  deleteExamSchedule($id)
    {
        if (!$this->find($id))
            return false;
        else {
            $this->where('id', '=', $id)->delete();
            return true;
        }
    }

    /**
     * make trash/draft an exam schedule
     * @param   integer $id
     * @return bool
     */
    public function  trashExamSchedule($id)
    {
        $exam = $this->find($id);
        $exam->status = "0";
        $exam->save();
        return $exam;
    }

    /**
     * update  and save the changes of an existing exam schedule
     * @param array $data
     * @return object
     */
    public function updateExam(int $pid, array $data)
    {

        //get the id of the data to be updated
        // $id = $data['id'];
        // unset($data['id']);
        $exam = $this->byKey($pid, 'id'); //either gets the exam or throws an error
        $exam->update($data); //update the fields in the database
        return $exam;
    }


    /*
     * get all exams that have been published by a specific teacher.
     * @param  int $teacherId is the id of the teacher who owns the exams.
     * @return collection of Exams
     */
    // public function TeacherPublishedExams($teacherId)
    // {
    //     return DB::table('exams')
    //         ->join('users', 'users.id', '=', 'exams.user_id')
    //         ->where([['users.active', 1], ['users.role_id', 2], ['exams.status', '!=', "0"]])
    //         ->select('exams.*')
    //         ->distinct()
    //         ->orderBy('exams.created_at', 'desc')
    //         ->paginate(9);
    // }

    /**
     * add a question to a  particular exam. 
     * exam meane 'group_has_exams' model, 
     * question meas 'exam_has_questions' model
     * @param  integer $groupId is the group_has_exams table primary key (which represents the exam).
     * @param  array   $questionData contains the question details.
     * @return Object            The added question.
     */
    // public function addQuestionToExam($groupId, array $questionData)
    // {
    //     //add the new question to the questions table and get its ID
    //     $newQuesitonID = QuestionController::store($questionData);
    //     //create a new instance of the exam_has_questions model using the newly created question Id.
    //     $newQuesiton = new ExamHasQuestions();
    //     //link this question with the given exam.
    //     $newQuesiton->exam_id = $groupId;
    //     $newQuesiton->question_id = $newQuesitionID;
    //     $newQuesiton->save();
    //     return $newQuesiton;
    // }

    /**
     * remove a question from an exam.
     * @param  [type] $groupId      [description]
     * @param  [type] $questionId [description]
     * @return [type]              [description]
     */
    // public function deleteQuestionFromExam($groupId, $questionId)
    // {
    //     $theGroup = GroupHasExams::findOrFail($groupId);
    //     if ($theGroup->questions()->detach($questionId)) {
    //         return "Successfully deleted";
    //     } else {
    //         App::abort(404);
    //     }
    // }

    /*******************************PRIVATE FUNCTIONS********************************/
}
