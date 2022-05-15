<?php

namespace App\Http\Livewire\Lawyer;

use Livewire\Component;
use App\Models\Appoiments;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AppoimentsLivewire extends Component
{

    public $appoiment;
    public $showingAppoimentModal = false;
    public $isEditMode = false;
    public $showingAppoimentInfoModal = false;
    public $info;

    public $user_id_cliente; // al cual se le asignara la cita
    public $title_appoiment;
    public $start_date;
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
    $formatDateStart = date('Y-m-d h:i', strtotime($this->start_date));

        $this->validate([
            'user_id_cliente'=>'required',
            'title_appoiment'=>'required',
            'start_date'=>'required|after_or_equal:today',
            'description'=>'required',


        ]);

        Appoiments::create([
            'user_id_solicitante'=>$user_id_solicitante,
            'user_id_solicitado'=>$this->user_id_cliente,
            'title_appoiment'=>$this->title_appoiment,
            'start_date'=>$formatDateStart,
            'end_date'=>$formatDateStart,
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
        $this->checkbox_time = $this->appoiment->checkbox_time;
        $this->description = $this->appoiment->description;

        $this->isEditMode = true;
        $this->showingAppoimentModal = true;
    }


public function updateAppoiment()
{
    $formatDateStart = date('Y-m-d h:i', strtotime($this->start_date));

    $this->validate([
        'user_id_cliente'=>'required',
        'title_appoiment'=>'required',
        'start_date'=>'required|after_or_equal:start_date',
        'description'=>'required',
    ]);

    $user_id_solicitante= Auth::user()->id;
    $this->appoiment->update(
        [
            'user_id_solicitante'=>$user_id_solicitante,
            'user_id_solicitado'=>$this->user_id_cliente,
            'title_appoiment'=>$this->title_appoiment,
            'start_date'=>$formatDateStart,
            'end_date'=>$formatDateStart,
            'checkbox_time'=>$this->checkbox_time,
            'description'=>$this->description,
    ]);
    $this->reset();
}


public function deleteAppoiment($id)
{
    $appoiment = Appoiments::findOrFail($id);
    $appoiment->update([
        'is_active'=>false,
        'status'=>'Cancelled'
    ]);
    $this->reset();
}



public function showAppoimentInfoModal($id)
{
    $this->reset();
    $this->info = Appoiments::findOrFail($id);
    $this->showingAppoimentInfoModal = true;
}

public function closeAppoimentInfoModal()
{
    $this->showingAppoimentInfoModal = false;
}


}
