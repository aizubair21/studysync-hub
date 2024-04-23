<?php

// use App\Models\Exam;

use App\Models\exam_has_question;
use App\Models\Group;
use App\Models\group_has_exam;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get("/test", function () {
    // return DB::table("groups")->where(["id" => 1, "g_admin" => 2])->value("g_name");
    // $data = DB::table("users")->where("vendor", "=", Auth::id());


    /**
     * get the authenticate users group with student
     */
    // $std = User::find(14);
    // return response()->json(Group::where("vendor", Auth::id())->with('students')->removeMember($std));


    /**
     * get authenticate users group only
     */
    // $authGp = Auth::user()->vendorGroups;

    // return Group::find(7)->removeStudent($std);

    // return Group::find(9)->getStudents();


    /**
     * add member to a group with addMember static method from Group fachades
     * addMember method are definded at Group models
     */
    // return Group::addMember(5, $std, ["vendor" => Auth::id(), 'status' => 1]);



    /**
     * remove a member from a group with removeMember  method in Group model facade.
     * this method is defined in Group model and called by Group::removeMember()
     */
    // $gp = Group::find(5);
    // return $gp->removeMember(14, ['vendor' => Auth::id(), 'status' => 0]);


    /**
     * get the group owner with orm relatioship belongsto
     */

    // return $gp;
    // return $gp->owner;
    // return $std->groups[0]->owner;





    // return exam_has_question::where(['exam_id' => 3])->has('options')->with("options")->get();
    return group_has_exam::find(3)->with("questions")->first();
    //but i wann get  questions that have not options yet !!!
});
