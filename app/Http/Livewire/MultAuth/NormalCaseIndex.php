<?php

namespace App\Http\Livewire\MultAuth;

use Livewire\Component;
use App\Models\CaseType;
use App\Models\NormalCases;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;


class NormalCaseIndex extends Component
{
    use WithFileUploads;

    public $sections = null;
    public $selectedClass = null; //    case_types_id
    public $selectedSection = null; //  user_id_abogado

    public $showingCaseModal = false;
    public $case_title;

    public $client_position;

    public $case_document;
    public $description;


    public function updatedSelectedClass($class_id)
    {
        $caseCategory = CaseType::where('id',$class_id)->value('case_category');

      $this->sections = User::role($caseCategory)->get();
    }

    public function render()
    {
        $case_types = CaseType::all();
        $cases = NormalCases::where('user_id_cliente',Auth::user()->id)->get();;

        return view('livewire.mult-auth.normal-case-index',
        [
            'classes' => $case_types,
        ]
        ,compact('cases','case_types'));
    }


    public function showCaseModal()
    {
        $this->showingCaseModal = true;
    }

    public function storeCase()
    {
    $user_id_cliente = Auth::user()->id;
    if(!empty($this->case_document)){
        $doc = $this->case_document->store('public/docs');
    };

        $this->validate([
            'case_title'=>'required',
            'selectedClass'=>'required',
            'selectedSection'=>'required',
            'client_position'=>'required',
            'description'=>'required',
            'case_document'=>'image|max:1024',


        ]);


    NormalCases::create([
            'case_title'=>$this->case_title,
            'user_id_cliente'=>$user_id_cliente,
            'case_types_id'=>$this->selectedClass,
            'user_id_abogado'=>$this->selectedSection,
            'client_position'=>$this->client_position,
            'description'=>$this->description,
            'case_document'=>$this->case_document,

        ]);

        $this->reset();
    }





}
