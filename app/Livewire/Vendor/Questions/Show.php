<?php

namespace App\Livewire\Vendor\Questions;

use App\Models\exam_has_question;
use App\Models\question_has_option;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Illuminate\Support\Str;

class Show extends Component
{

    //URL Property
    #[URL]
    public $isHeader = false, $index = 1;

    public $id, $serverData, $questions, $options = [];

    // class property 
    public $isSelectQuestionModal, $isSearchModal, $isEdit;

    //mount 
    public function mount($qid, $eid = null)
    {
        $this->id = decrypt($qid);
        // $this->questions = exam_has_question::with('options')->where(['id' => $this->id, 'vendor' => Auth::id()])->get()->toArray();
        $this->serverData = auth()->user()->schedules()->find(decrypt($eid));
        $this->getQuestionAndOption();
    }

    // after mount method

    private function getQuestionAndOption()
    {
        $this->questions = $this->serverData->questions()->with("options")->find($this->id)->toArray();
        // $this->options = $this->serverData['options'];

        if (!empty($this->questions['options'])) {

            foreach ($this->questions["options"] as $key => $value) {
                $this->options[$key]['id'] = $value['id'];
                $this->options[$key]['question'] = $value['question'];
                $this->options[$key]['option'] = $value['option'];
                $this->options[$key]['type'] = $value['type'];
                $this->options[$key]['is_correct'] = $value['is_correct'];
            }
        }
    }

    //render 
    public function render()
    {
        return view('livewire.vendor.questions.show')->extends("layouts.vendor.app");
    }

    /**
     * updated lifecycle hooks
     * @param updated property
     * @return void
     * do something
     */
    public function updated($property)
    {
        // dd($property);
        if (Str::startsWith($property, 'options')) {
            $this->updateOptions($property);
        }

        if (Str::startsWith($property, "questions")) {
            $this->updateQuestion();
        }
    }


    /**
     * Delete an option from question
     * @param options location index to option array
     * 
     */
    public function removeOption($opIndex)
    {
        if ($this->options[$opIndex]['id'] == '') {
            array_splice($this->options, $opIndex, 1);
        } else {
            if ($this->options[$opIndex]['question'] == $this->questions['id']) {
                if (question_has_option::find($this->options[$opIndex]['id'])->delete()) {
                    array_splice($this->options, $opIndex, 1);
                    $this->questions['has_option'] = count($this->options);
                    $this->updateQuestion();
                }
            }
        }
    }


    /**
     * option update as soon as update to client side
     * 
     */
    public function updateOptions($updateProperty)
    {
        if (!empty($this->options)) {
            foreach ($this->options as $key => $value) {
                if ($updateProperty == "options.$key.option" || $updateProperty == "options.$key.is_correct") {
                    # code...
                    if ($value['id'] != "") {
                        //if id exists, then update
                        // dd("updat");
                        // dd($this->options[$key]);
                        question_has_option::find($value['id'])->update($this->options[$key]);
                    } else {
                        //id not exists, insert as new
                        // dd($this->options[$key]);
                        question_has_option::create($this->options[$key]);
                    }
                }
            }
        }
    }


    /**
     * question update
     */
    public function updateQuestion()
    {
        $this->serverData->questions()->find($this->id)->update(['question' => $this->questions['question'], 'has_option' => $this->questions['has_option']]);
    }



    /**
     * add more field to question option
     */
    public function addMoreFild()
    {
        $opInd = count($this->options) == 0 ? 0 : count($this->options) + 1;
        $this->options[$opInd]['option'] = "";
        $this->options[$opInd]['is_correct'] = 0;
        $this->options[$opInd]['id'] = "";
        $this->options[$opInd]['type'] = "text";
        $this->options[$opInd]['question'] = $this->id;
        $this->questions['has_option'] = count($this->options);
        $this->updateQuestion();
        // dd($opInd);
    }



    /**
     * destroy method
     * @param encrypted questin id
     */
    public function destroy()
    {
        $this->questions->delete();
        // $this->dispatchBrowserEvent('closeModal');
    }

    /**
     * edit method to make a question editable
     * @param iteration index
     */
    public function doEdit($index)
    {
        $this->isEdit = $index;
    }
}
