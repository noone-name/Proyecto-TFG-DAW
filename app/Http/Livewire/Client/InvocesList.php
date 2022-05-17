<?php

namespace App\Http\Livewire\Client;

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
    public function render()
    {
            $invocescli = CaseInvoce::whereHas('normalcases_inc', function ($query) {
                $query->where('user_id_cliente',Auth::user()->id);
            })->get();

                return view('livewire.client.invoces-list',compact('invocescli'));
    }
}
