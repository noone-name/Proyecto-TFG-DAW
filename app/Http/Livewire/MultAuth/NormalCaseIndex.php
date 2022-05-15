<?php

namespace App\Http\Livewire\MultAuth;

use Livewire\Component;
use App\Models\CaseType;
use App\Models\NormalCases;
use App\Models\NormalCasesStatus;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;


class NormalCaseIndex extends Component
{
    use WithFileUploads;

    public $normal_case;
    public $showingCaseModal = false;
    public $isEditMode = false;
    public $newDoc;


    public $sections = null;
    public $selectedClass = null; //    case_types_id
    public $selectedSection = null; //  user_id_abogado
    public $case_title;
    public $client_position;
    public $case_document;
    public $description;
    public $oldDoc;

    public $showingCaseStatusInfoModal = false;
    public $info;



    public function updatedSelectedClass($class_id)
    {
        $caseCategory = CaseType::where('id',$class_id)->value('case_category');

      $this->sections = User::role($caseCategory)->get();
    }

    public function render()
    {
        $case_types = CaseType::all();
        $cases = NormalCases::where([['user_id_cliente',Auth::user()->id],['is_active',true]])->get();;


        return view('livewire.mult-auth.normal-case-index',
        [
            'classes' => $case_types,
        ]
        ,compact('cases','case_types'));
    }


    public function showCaseModal()
    {
        $this->reset();
        $this->showingCaseModal = true;
    }

    public function storeCase()
    {
        try {

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
                    'case_document'=>'mimes:jpg,jpeg,bmp,png,gif,svg,pdf|max:10240',


                ]);

            $caseId = NormalCases::create([
                    'case_title'=>$this->case_title,
                    'user_id_cliente'=>$user_id_cliente,
                    'case_types_id'=>$this->selectedClass,
                    'user_id_abogado'=>$this->selectedSection,
                    'client_position'=>$this->client_position,
                    'description'=>$this->description,
                    'case_document'=>$doc,

                ]);

                $id = $caseId->id;

                NormalCasesStatus::create([
                    'normal_cases_id' =>$id
                ]);

                $this->reset();

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function showEditCaseModal($id)
    {
        $this->normal_case = NormalCases::findOrFail($id);
        $this->case_title = $this->normal_case->case_title;
        $this->selectedClass = $this->normal_case->case_types_id;
        $this->selectedSection = $this->normal_case->user_id_abogado;
        $this->client_position = $this->normal_case->client_position;
        $this->description = $this->normal_case->description;
        $this->oldDoc = $this->normal_case->case_document;
        $this->isEditMode = true;
        $this->showingCaseModal = true;
    }


public function updateCase()
{
    $this->validate([
        'case_title'=>'required',
        'selectedClass'=>'required',
        'selectedSection'=>'required',
        'client_position'=>'required',
        'description'=>'required',
        'case_document'=>'mimes:jpg,jpeg,bmp,png,gif,svg,pdf|max:10240',


    ]);

    $doc =  $this->normal_case->case_document;
    if ($this->case_document) {
        $doc = $this->case_document->store('public/docs');
    }

    $user_id_cliente = Auth::user()->id;
    $this->normal_case->update(
        [
            'case_title'=>$this->case_title,
            'user_id_cliente'=>$user_id_cliente,
            'case_types_id'=>$this->selectedClass,
            'user_id_abogado'=>$this->selectedSection,
            'client_position'=>$this->client_position,
            'description'=>$this->description,
            'case_document'=>$doc,
    ]);
    $this->reset();
}


public function deleteCase($id)
{
    $normal_case = NormalCases::findOrFail($id);
    Storage::delete($normal_case->case_document);
    $normal_case->update([
        'is_active'=>false,
        'status'=>'Cancelled'
    ]);
    $this->reset();
}




public function showCaseStatusInfoModal($id)
{
    $this->reset();
//    $this->info = Appoiments::findOrFail($id);
    $this->showingCaseStatusInfoModal = true;
}

public function closeCaseStatusInfoModal()
{
    $this->showingCaseStatusInfoModal = false;
}







}
