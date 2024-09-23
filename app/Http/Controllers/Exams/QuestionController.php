<?php

namespace App\Http\Controllers\Exams;

use App\Http\Controllers\Controller;
use App\Models\exam_has_question;
use App\Models\group_has_exam;
use App\Models\question_has_option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    //show all question belongs to a group
    public function index($eid)
    {
        // dd($eid);
        return view("livewire.view.vendor.question.index", ["id" => encrypt($eid)]);
    }

    /**
     * create method
     */
    public function create(Request $req)
    {
        $data = "";
        if (empty($req->eid)) {
            $data = group_has_exam::where(["vendor" => Auth::id()])->get();
        }
        // dd($data);
        return view("livewire.view.vendor.question.create", ["eid" => $req->eid, "data" => $data]);
    }

    //store  question in database 
    public static function save($req)
    {
        /**
         * if we send request()->all() from scheduleIndex to this  method, it will return all data of the form
         */
        // return $req["components"][0]['updates']["options.0"]; 


        /**
         * if we send $this->all()
         */
        // return $req['question'];
        // return $req;

        try {
            $questionStatus = array(
                "status" => 1,
                // "created_at" => now(),
                // "updated_at" => now(),
            );
            // $mergeArray = ;
            // dd($mergeArray);
            /**
             * we merge our $questionFunctionality and questionData comes by livewire component
             * then one single array pass to insertGetId method.
             */
            $questionId = exam_has_question::insertGetId($req["questionData"]); //store the question and get the latest id.
            // $returnStr = [];

            foreach ($req["options"] as $key => $value) {

                $is_correct = 0;
                if ($key == $req['correct'][0]) { //correct [ 0 => 1/2/3]
                    $is_correct = 1; //if index of loop and the value of 0 index of correct array is same, make the value of is_correct variable to 1, else 0.
                } else {
                    $is_correct = 0;
                }

                // array_push($returnStr, "option is " .  $value  . " . is correct " . $is_correct);

                question_has_option::create(
                    [
                        'question' => $questionId,
                        'option' => $value,
                        'is_correct' => $is_correct, // 0, 1 based on the condition above
                        'type' => 'text'
                    ]
                );
            }
            return "ok";
        } catch (\Throwable $th) {
            //throw $th;
            return  response()->json([$th]);
        }
    }

    public function store(Request $req)
    {
        $questionData = $req->input();
        return $req->except(["_token"]);
    }

    private function newQuestion($data) {}


    /**
     * show method to show a specific question
     */
    public function show($qid)
    {
        // $id = decrypt($qid);
        return view("livewire.view.vendor.question.show", ["id" => $qid]);
    }

    /**
     * edit method to edit specific question
     * @perams question id with encripted
     */
    public function edit($quid)
    {
        return view("livewire.view.vendor.question.edit", ["qid" => $quid]);
    }


    /**
     * destroy
     * @param encrypted question id
     */
    public function destroy(Request $req)
    {
        $id = decrypt($req->quid);
        //is permit to delete question
        $question = exam_has_question::where(["id" => $id, "vendor" => Auth::id()]);
        $question->delete();
        return redirect()->back();
    }


    
}
