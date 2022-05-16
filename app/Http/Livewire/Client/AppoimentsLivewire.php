<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Appoiments;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AppoimentsLivewire extends Component
{

    public $appoiment;
    public $showingAppoimentModal = false;
    public $showingAppoimentInfoModal = false;
    public $info;

    public $isEditMode = false;


    public $user_id_abogado; // al cual se le asignara la cita
    public $title_appoiment;
    public $start_date;
    public $checkbox_time;
    public $description;

    public $status='Active';
    public $manageUser='user_id_solicitante';
    public $appoimentLawyer=false;


    public function ProximasCitas() {
        $this->status = 'Active';
        $this->manageUser = 'user_id_solicitante';
        $this->appoimentLawyer=false;
    }

    public function CitasPendientesAceptar() {
        $this->status = 'Pending';
        $this->manageUser = 'user_id_solicitante';
        $this->appoimentLawyer=false;

    }

    public function HistoricoDeCitas() {
        $this->status = 'Todos';
        $this->manageUser = 'user_id_solicitante';
        $this->appoimentLawyer=false;
    }

    public function CitasPorConfirmar() {
        $this->status = 'Pending';
        $this->manageUser = 'user_id_solicitado';
        $this->appoimentLawyer = true;

    }


    public function render()
    {
        $abogados = User::role('Abogado')->get();

        if ($this->status == 'Active') {
            $citas = Appoiments::where([[$this->manageUser,Auth::user()->id],['status',$this->status]])->orWhere([['user_id_solicitado',Auth::user()->id],['status',$this->status]])->get();

        } else {
            if ($this->status == 'Todos') {
                $citas = Appoiments::where($this->manageUser,Auth::user()->id)->orWhere('user_id_solicitado',Auth::user()->id)->get();
            }
            else $citas = Appoiments::where([[$this->manageUser,Auth::user()->id],['status',$this->status]])->get();
        }



        return view('livewire.client.appoiments-livewire',compact('abogados','citas'));
    }




    public function showAppoimentModal()
    {
                $this->resetExcept(['status','manageUser']);

        $this->showingAppoimentModal = true;
    }



    public function storeAppoiment()
    {
    $user_id_solicitante= Auth::user()->id;
    $formatDateStart = date('Y-m-d h:i', strtotime($this->start_date));

        $this->validate([
            'user_id_abogado'=>'required',
            'title_appoiment'=>'required',
            'start_date'=>'required|after_or_equal:today',
            'description'=>'required',


        ]);

        Appoiments::create([
            'user_id_solicitante'=>$user_id_solicitante,
            'user_id_solicitado'=>$this->user_id_abogado,
            'title_appoiment'=>$this->title_appoiment,
            'start_date'=>$formatDateStart,
            'end_date'=>$formatDateStart,
            'checkbox_time'=>$this->checkbox_time,
            'description'=>$this->description,

        ]);

        $this->resetExcept(['status','manageUser']);


    }


    public function showEditAppoimentModal($id)
    {
        $this->appoiment = Appoiments::findOrFail($id);
        $this->user_id_abogado = $this->appoiment->user_id_abogado;
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
        'user_id_abogado'=>'required',
        'title_appoiment'=>'required',
        'start_date'=>'required|after_or_equal:start_date',
        'description'=>'required',
    ]);

    $user_id_solicitante= Auth::user()->id;
    $this->appoiment->update(
        [
            'user_id_solicitante'=>$user_id_solicitante,
            'user_id_solicitado'=>$this->user_id_abogado,
            'title_appoiment'=>$this->title_appoiment,
            'start_date'=>$formatDateStart,
           'end_date'=>$formatDateStart,
            'checkbox_time'=>$this->checkbox_time,
            'description'=>$this->description,
    ]);
            $this->resetExcept(['status','manageUser']);

}


public function deleteAppoiment($id)
{
    $appoiment = Appoiments::findOrFail($id);
    $appoiment->update([
        'is_active'=>false,
        'status'=>'Cancelled'
    ]);
            $this->resetExcept(['status','manageUser']);

}


public function showAppoimentInfoModal($id)
{
            $this->resetExcept(['status','manageUser']);

    $this->info = Appoiments::findOrFail($id);
    $this->showingAppoimentInfoModal = true;
}

public function closeAppoimentInfoModal()
{
    $this->showingAppoimentInfoModal = false;
}

public function confirmAppoimentFromLawyyers($id)
{
    $confirmAppoiment = Appoiments::findOrFail($id);
    $confirmAppoiment->update([
        'is_active'=>true,
        'status'=>'Active'
    ]);
    $this->resetExcept(['status','manageUser']);

}

public function rejectAppoimentFromLawyyers($id)
{
         $rejecAppoiment = Appoiments::findOrFail($id);
         $rejecAppoiment->update([
             'is_active'=>false,
             'status'=>'Rejected'
         ]);
         $this->resetExcept(['status','manageUser']);


}


}

