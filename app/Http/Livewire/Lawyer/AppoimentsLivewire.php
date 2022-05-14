<?php

namespace App\Http\Livewire\Lawyer;

use Livewire\Component;
use App\Models\CaseType;
use App\Models\NormalCases;
use App\Models\Appoiments;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AppoimentsLivewire extends Component
{
    use WithFileUploads;

    public $appoiment;
    public $showingAppoimentModal = false;
    public $isEditMode = false;


    public $user_id_cliente; // al cual se le asignara la cita
    public $title_appoiment;
    public $start_date;
    public $end_date;
    public $checkbox_time;
    public $description;


    public function render()
    {
        $clients = User::role('Cliente')->get();
        $citas = Appoiments::where('user_id_solicitante',Auth::user()->id)->get();;

        return view('livewire.lawyer.appoiments-livewire',compact('clients','citas'));
    }


    public function showAppoimentModal()
    {
        $this->reset();
        $this->showingAppoimentModal = true;
    }

    public function storeAppoiment()
    {
    $user_id_solicitante= Auth::user()->id;

        $this->validate([
            'user_id_cliente'=>'required',
            'title_appoiment'=>'required',
            'start_date'=>'required|after_or_equal:today',
            'end_date'=>'required|after_or_equal:start_date',
            'description'=>'required',


        ]);

        Appoiments::create([
            'user_id_solicitante'=>$user_id_solicitante,
            'user_id_solicitado'=>$this->user_id_cliente,
            'title_appoiment'=>$this->title_appoiment,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'checkbox_time'=>$this->checkbox_time,
            'description'=>$this->description,

        ]);

        $this->reset();


    }


    public function showEditAppoimentModal($id)
    {
        $this->appoiment = Appoiments::findOrFail($id);
        $this->user_id_cliente = $this->appoiment->user_id_cliente;
        $this->title_appoiment = $this->appoiment->title_appoiment;
        $this->start_date = $this->appoiment->start_date;
        $this->end_date = $this->appoiment->end_date;
        $this->checkbox_time = $this->appoiment->checkbox_time;
        $this->description = $this->appoiment->description;

        $this->isEditMode = true;
        $this->showingAppoimentModal = true;
    }


public function updateAppoiment()
{
    $this->validate([
        'user_id_cliente'=>'required',
        'title_appoiment'=>'required',
        'start_date'=>'required|after_or_equal:start_date',
        'end_date'=>'required|after:start_date',
        'description'=>'required',
    ]);

    $user_id_solicitante= Auth::user()->id;
    $this->appoiment->update(
        [
            'user_id_solicitante'=>$user_id_solicitante,
            'user_id_solicitado'=>$this->user_id_cliente,
            'title_appoiment'=>$this->title_appoiment,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'checkbox_time'=>$this->checkbox_time,
            'description'=>$this->description,
    ]);
    $this->reset();
}


public function deleteCase($id)
{
    $normal_case = Appoiments::findOrFail($id);
    $normal_case->delete();
    $this->reset();
}

}
