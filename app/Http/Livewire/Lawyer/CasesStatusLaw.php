<?php

namespace App\Http\Livewire\Lawyer;

use Livewire\Component;
use App\Models\CaseType;
use App\Models\NormalCases;
use App\Models\NormalCasesStatus;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;


class CasesStatusLaw extends Component
{
    use WithFileUploads;

    public $normal_case_status;
    public $showingCaseStatusModal = false;
    public $isEditMode = false;
    public $showingCaseStatusInfoModal = false;
    public $info;


    public $cancel_answer;
    public $lawyer_docs_requirements;
    public $potential_resolution;
    public $extra_info;




    public $search='Active';

    public function ProximosCasos() { $this->search = 'Active'; }

    public function CasosPorConfirmar() { $this->search = 'Pending'; }

    public function HistoricoDeCitas() { $this->search = 'Todos'; }

    public function render()
    {
 // $casesstatus = NormalCasesStatus::find(1)->normalcases->where('status','Rejected')->get();
// normalstatus
$casesstatus = NormalCasesStatus::whereHas('normalcases', function ($query) {

    if ($this->search == 'Todos') {
        $query->where('user_id_abogado',Auth::user()->id);

    }
    else
    $query->where([['user_id_abogado',Auth::user()->id],['status',$this->search]]);


})->get();



        return view('livewire.lawyer.cases-status-law',compact('casesstatus'));
    }


    public function showCaseModal()
    {
        $this->resetExcept('search');
        $this->showingCaseStatusModal = true;
    }



    public function showCaseStatusModal($id)
    {
        $this->isEditMode = false;

        $this->normal_case_status = NormalCasesStatus::findOrFail($id);

        $this->cancel_answer = $this->normal_case_status->cancel_answer;
        $this->lawyer_docs_requirements = $this->normal_case_status->lawyer_docs_requirements;
        $this->potential_resolution = $this->normal_case_status->potential_resolution;
        $this->extra_info = $this->normal_case_status->extra_info;


        $this->showingCaseStatusModal = true;
    }


public function updateCaseStatus()
{
    try {
    $this->validate([
    'lawyer_docs_requirements'=>'required',
            'potential_resolution'=>'required',
            'extra_info'=>'required',
        ]);
        $this->normal_case_status->update(
            [
                'lawyer_docs_requirements'=>$this->lawyer_docs_requirements,
                'potential_resolution'=>$this->potential_resolution,
                'extra_info'=>$this->extra_info,
        ]);

        $normal_case = NormalCases::findOrFail($this->normal_case_status->normal_cases_id);
        $normal_case->update([
            'status'=>'Active'
        ]);

        $this->resetExcept('search');

    } catch (\Throwable $th) {
            throw $th;
        }

}



public function showRejectCaseStatusModal($id)
{
    $this->normal_case_status = NormalCasesStatus::findOrFail($id);

    $this->cancel_answer = $this->normal_case_status->cancel_answer;

    $this->isEditMode = true;
    $this->showingCaseStatusModal = true;
}

public function rejectCaseStatus()
{
        try {
     $this->validate([
         'cancel_answer'=>'required',
     ]);

     $this->normal_case_status->update(
         [
             'cancel_answer'=>$this->cancel_answer,
        ]);


        $normal_case = NormalCases::findOrFail($this->normal_case_status->normal_cases_id);
        Storage::delete($normal_case->case_document);
        $normal_case->update([
            'is_active'=>false,
            'status'=>'Rejected'
        ]);
     $this->resetExcept('search');

    } catch (\Throwable $th) {
            throw $th;
        }
}



public function showCaseStatusInfoModal($id)
{
    $this->resetExcept('search');
//    $this->info = Appoiments::findOrFail($id);
    $this->showingCaseStatusInfoModal = true;
}

public function closeCaseStatusInfoModal()
{
    $this->showingCaseStatusInfoModal = false;
}


}