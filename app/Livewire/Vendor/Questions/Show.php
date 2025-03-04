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
use Livewire\WithFileUploads;
use Livewire\Attributes\Reactive;

class Show extends Component
{

    use WithFileUploads;

    //URL Property
    #[Reactive]
    public $isHeader = false, $index;

    public $id, $serverData, $questions, $options = [];

    // class property 
    public $isSelectQuestionModal, $isSearchModal, $isEdit, $testModel;

    // refresh listeners 
    protected $listeners = ['refresh' => '$refresh', 'question-removed' => '$refresh', 'question-added' => '$refresh'];

    //mount 
    public function mount($qid)
    {
        $this->id = decrypt($qid);
        $this->getQuestionAndOption();
    }

    // after mount method get the question and option belongs to
    private function getQuestionAndOption()
    {
        $this->questions = exam_has_question::where(["vendor" => Auth::id(), "id" => $this->id])->with("options")->get()->toArray()[0];

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
        return view('livewire.vendor.questions.show',)->extends("layouts.vendor.app");
    }

    /**
     * updated lifecycle hooks
     * @param updated property
     * @return void
     * do something
     */
    public function updated($property)
    {
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
                    if ($value['id'] != "") {
                        question_has_option::find($value['id'])->update($this->options[$key]);
                    } else {
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
        exam_has_question::where(['vendor' => Auth::id(), 'id' => $this->id])->update(
            [
                'question' => $this->questions['question'],
                'has_option' => $this->questions['has_option'],
                'answer_type' => $this->questions['answer_type'],
                'info' => $this->questions['info'],
                'tags' => $this->questions['tags'],
            ]
        );
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
    }

    /**
     * destroy method
     * @param encrypted questin id
     */
    public function destroy()
    {
        exam_has_question::where(['vendor' => Auth::id(), 'id' => $this->id])->delete();
        $this->dispatch('refresh');
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
