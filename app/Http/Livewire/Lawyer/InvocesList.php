<?php

namespace App\Http\Livewire\Lawyer;

use Livewire\Component;
use App\Models\CaseType;
use App\Models\NormalCases;
use App\Models\NormalCasesStatus;
use App\Models\CaseInvoce;
use App\Models\User;

use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class InvocesList extends Component
{
    public $showingCaseInvoceModal;
    public $info;
    public $test;

    public function render()
    {
            $invoces = CaseInvoce::whereHas('normalcases_inc', function ($query) {
                $query->where('user_id_abogado',Auth::user()->id);
            })->get();

                return view('livewire.lawyer.invoces-list',compact('invoces'));
    }


    public function showCaseInvoceModal($id)
    {
    $this->resetExcept(['info']);

    $this->showingCaseInvoceModal = true;
    $this->info = CaseInvoce::find($id);
    }

    public function closeClientInfoModal()
    {
        $this->showingCaseInvoceModal = false;
    }

    public function FinishCaseStatus($invoce)
    {
        $caso = NormalCases::findOrFail($invoce);

         $caso->update([
             'status'=>'Completed',
         ]);;
    }




}
