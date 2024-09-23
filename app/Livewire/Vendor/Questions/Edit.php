<?php

namespace App\Livewire\Vendor\Questions;

use App\Models\exam_has_question;
use App\Models\question_has_option;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\DB;

class Edit extends Component
{
    /**
     * url peram
     */
    public $id, $questions;
    private $data;


    /**
     * editable data
     */
    public $qs, $q_type, $options = [], $option = [], $a_type, $is_correct, $file, $tags, $info;

    /**
     * mount method to get all necessary data from database
     */
    public function mount($quid)
    {
        // dd($quid);
        try {
            $this->id = decrypt(trim($quid));
            // dd($this->id);
            $this->data = exam_has_question::with('options')->where(['id' => $this->id, 'vendor' => Auth::id()])->first();
            // dd($this->questions);

            $this->questions['question'] = $this->data->question;
            $this->questions['type'] = $this->data->type;
            $this->questions['tags'] = $this->data->tags;
            $this->questions['info'] = $this->data->info;
            $this->questions['answer_type'] = $this->data->answer_type;


            // $this->questions['question'] = $this->data->question;

            foreach ($this->data->options as $key => $opt) {
                $this->questions['options'][$key]['option'] = $opt->option;
                $this->questions['options'][$key]['question'] = $opt->question;
                $this->questions['options'][$key]['is_correct'] = $opt->is_correct;
                $this->questions['options'][$key]['id'] = $opt->id;
                $this->questions['options'][$key]['type'] = $opt->type;
                // array_push($this->options, $opt);
            }

            if (count($this->questions['options']) < 4) {
                while (count($this->questions['options']) < 4) {
                    $opInd = count($this->questions['options']) + 1;
                    $this->questions["options"][$opInd]['option'] = "";
                    $this->questions["options"][$opInd]['is_correct'] = 0;
                    $this->questions["options"][$opInd]['id'] = "";
                    $this->questions["options"][$opInd]['type'] = "text";
                    $this->questions["options"][$opInd]['question'] = $this->id;
                }
                // dd($this->questions['options']);
            }

            // dd($this->options);

            // $this->questions['question'] = $data->question;
            // dd($this->questions);
        } catch (DecryptException $e) {
            dd($e);
        }
    }


    /**
     * update
     */
    public function update()
    {
        exam_has_question::where(["id" => $this->id, "vendor" => Auth::id()])->update(
            [
                "question" => $this->questions['question'],
                "type" => $this->questions['type'],
                "tags" => $this->questions['tags'],
                "info" => $this->questions['info'],
                "answer_type" => $this->questions['answer_type'],
            ]
        );
        // $this->data->save();
        // $opti = [];
        foreach ($this->questions['options'] as $key => $opt) {
            // dd($opt);
            // question_has_option::updateOrInsert()
            if ($opt["id"]) {
                question_has_option::where(["id" => $opt["id"]])->update(
                    [
                        "option" => $opt["option"],
                        "question" => $opt["question"],
                        "type" => $opt["type"],
                        "is_correct" => $opt["is_correct"],
                    ]
                );
            } else {
                question_has_option::insert(
                    [
                        "option" => $opt["option"],
                        "question" => $opt["question"],
                        "type" => $opt["type"],
                        "is_correct" => $opt["is_correct"],
                    ]
                );
            }
            // DB::table('question_has_options')->updateOnInsert(['id' => $opt->id, 'question' => $this->id], $opt);
        };
        // dd($this->questions['options']);
        $this->redirectIntended(session()->get('_previous')['url'], true);
    }

    public function render()
    {
        return view('livewire.vendor.questions.edit');
    }
}
