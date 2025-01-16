<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Validate;

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



    /*
	|--------------------------------------------------------------------------
	| RELATIONSHIP METHODS
	|--------------------------------------------------------------------------
    */
    public function students()
    {

        return $this->belongsToMany(User::class, "group_has_students")->withPivot(['status', 'is_moderator', 'moderator_until', 'banned_as', 'banned_until']);
        /**
         * but i wanna add all field of 'group_has_students' table with this relationship
         * in this situation use 'withPivot' method instead.
         */
    }

    /**
     * Many group has one vendor/creator
     */
    public function vendors()
    {
        return $this->belongsTo(User::class, 'vendor');
    }

    /**
     * One group may contain many schedules
     */
    public function schedules()
    {
        return $this->hasMany(group_has_exam::class, "group");
    }


    /**
     * static method addMember 
     * use to add member to a group
     * by calling Group::addMember() and send required data
     * @param Group $groupId
     * @param User $userId
     * extra data as, ['vendor' => Auth::id(), Stutus" => 1] etc
     * @return bool 
     * 
     */
    public static function addMember($groupId, $userId, $extra_data)
    {
        if (Group::where('id', $groupId)->exists()) {
            return Group::find($groupId)->addStudent($userId, $extra_data);
        } else {
            return false;
        }
    }

    /**
     * Add student to the group model.
     * @return bool
     */
    protected function addStudent($user, $extra_data = null)
    {
        // Avoid duplicate entries
        if (!$this->students()->get()->contains($user)) {
            // return $this->students()->save($user);
            //have to make sure add a vendor id
            $this->students()->attach($user, $extra_data);
            return response()->json(["status" => "ok", "messsage" => "User inserted to group"], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'User already in this group'], 404);
        }
        // return false;
    }


    /**
     * update student information to group modal
     * @return bool
     */
    public function updateMember($studentId, $newData)
    {
        $oldData = $this->students()->get()->filter(function ($value, $key) use ($studentId) {
            return $value['id'] == $studentId;
        })->first();

        $updData = array_merge($oldData, $newData);
        return $this->updateStudent($studentId, $updData);
    }



    /**
     * Update an existing student record with new data.
     * If no user is provided, it will remove the association from the group.
     * @param int|null $userId The ID of the user to associate with the group (optional).
     * @param array $newData An associative array containing the new data for the user/group relationship.
     */
    protected function updateStudent($userId, $newData)
    {
        try {
            if (isset($userId)) {
                // Existing user - just update the data
                $record = $this->students()->where('id', '=', $userId)->first();
                if ($record) {
                    $record->fill($newData);
                    $record->push();
                } else {
                    // throw new Exception("Invalid user ID");
                    return response()->json(['status' => "error", 'message' => 'Invalid user'], 404);
                }
            } else {
                // New user - add a new record or throw an error message.
                // $userGroup = UserGroup::create($newData);
                // $this->students()->add($userGroup);

                return response()->json(['status' => "error", 'message' => 'Not implemented yet'], 404);
            }

            return true;
        } catch (Exception $e) {
            Log::error("Failed to update user/group info: " . $e->getMessage());
            // return false;
            return response()->json(['status' => "error", 'message' => 'Faild to update info'], 404);
        }
    }

    /**
     * update a group member pivot value.
     * pivot value comes with 'students' relatioship.
     * pivot are the thirs table filds
     */
    public function updateMemberPivot($memberId, $newData)
    {
        $student = $this->students()->where('user_id', '=', $memberId)->first();
        if (!$student) {
            App::abort(404);
        }
        // dd($student["pivot"]);
        $student->pivot->fill($newData);
        $student->pivot->save();
        // foreach ($newData as $key => $value) {
        //     $student->pivot[$key] = $value;
        // }
        $student->save();
    }


    /**
     * Remove Student from the group model.
     * @param User $user
     * @return bool
     */
    public function removeMember($user, $extra_data = null)
    {
        // group_has_student::
        return $this->students()->where($extra_data)->detach($user);
    }


    /**
     * add a new  exam to a group via group modal
     */
    public function addSchedule(array $schedules)
    {
        // implement an adding exams for group. exams is the object of group_has_exams Models
        // and it has many attributes that should be added to this method.
        // so we can use create() or save() methods on it.
        // $groupHasExam = new Group_has_exam;
        // $groupHasExam->setConnection($connection);
        // $groupHasExam->additional_attributes = json_encode($additionalAttributes);
        // $groupHasExam->group_id = $groupId;
        // $groupHasExam->exam_id = $examId;
        // $groupHasExam->save();

        /*
         * if you want to make sure all data are saved into database before returning response
         * you should use save() not create(). because create() does not guarantee that all data have been saved into DB before next line of code
         * you should use transaction here.
         */
        // DB::transaction(function () use (&$schedules, $schedules){
        //     foreach ($schedles as &$item) {
        //         $this->schedules()->create($item);
        //     }
        // });

        /**
         * insert a row to 'group_has_exams' table, via this group models.
         * 'group_has_exams' table contains a field named group. fill that with this group id
         * have another field name 'vendor' field that with current login user's id
         */
        // $currentUser = Auth::user();
        // $vendorsIds = array_get($extra_data,'vendors',[]);
        // $usersIds   = array_get($extra_data,'users',[]);
        // $groupsIds  = array_merge([$this->id],array_get($extra_data,'groups',[]));
        // $newRecords= [];
        // foreach ($schedules as $record) {
        //     $record['group']=$this->id;
        //     $record['vendor']=$currentUser->id;
        //     if(!empty($vendorsIds)){$record['vendors']=implode(',',$vendorsIds);}
        //     else{unset($record['vendors']);}
        //     if(!empty($usersIds)){
        //         $record['users']= implode(",",$usersIds).','.$currentUser->id ;
        //     }else{
        //         unset($record['users']);
        //     }
        //     $newRecord = Group_has_user::fromDataStd($record);
        //     $newRecords []= $newRecord;
        // }
        // return Group_has_user::insert($newRecords);

        $this->schedules()->create($schedules);
    }


    /**
     * update schedules
     */



    /**
     * Remove group
     * @param Group $group
     */
    public function destroyGroup(Group $group)
    {
        // if ($this->id == $group->id) {
        //     // Delete all records in pivot table first.
        //     DB::table('group_has_users')->where('group_id', '=', $this->id)->delete();
        //     DB::table('group_has_groups')->where('parent_group_id', '=', $this->id)->delete();
        //     $group->delete();
        // } elseif ($this->isSubGroupOf($group)) {
        //     DB::table('group_has_groups')
        //         ->where([
        //             ['child_group_id', '=', $group->id],
        //             ['parent_group_id', '=', $this->id]
        //         ])->delete();
        // } else {
        //     throw new InvalidArgumentException("The given group is not a sub-group of this group.");
        // }

        if ($this->id == $group->id) {
            //Delete all record in pivot table first.
            // DB::table("group_has_studets")->where(["vendor" => Auth::id(), "group_id" =>  $this->id])->delete();
            // DB::table("group_has_exams")->where("group", $this->id)->delete();

            $group->delete();
            return response()->json(['status' => 'ok', "message" => "Group has been deleted !"], 200);
        } else {
            return response()->json(['status' => 'error', "message" => "Error !"], 404);
        };
    }


    /**
     * Get all of the owning user models.
     */
    // public function owner()
    // {
    //     return $this->belongsTo(User::class, "vendor");
    // }

    /**
     * The students that belong to the group.
     */
    // public function getStudents()
    // {
    //     return $this->belongsToMany('App\Models\User', 'group_has_students')
    //         ->withPivot('role', 'status')
    //         ->wherePivot('status', '=', Group::STATUS_APPROVED)
    //         ->using('App\Models\GroupStudentPivot');
    // }


    //             return $this->students()->save($user);
    //         }
    //         return true;
    //     }

    // /**
    //  * Remove Student from the group model.
    //  * @param User $user
    //  */
    // public function removeStudent(User $user)
    // {
    //     $this->students()->remove($user);
    //     //here remove is undefined method, when i call this method
    //     //i get Call to undefined method App\Models\Group::remove()
    //     //remove method not existd here

    // }
}
