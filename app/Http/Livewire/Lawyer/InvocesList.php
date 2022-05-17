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
    public $invoqueData;
    public $showingCaseInvoceModal;

    public function render()
    {
            $invoces = CaseInvoce::whereHas('normalcases_inc', function ($query) {
                $query->where('user_id_abogado',Auth::user()->id);
            })->get();

                return view('livewire.lawyer.invoces-list',compact('invoces'));
    }


    public function showCaseInvoceModal()
    {
        $this->resetExcept('search');
        $this->showingCaseInvoceModal = true;
    }


}
