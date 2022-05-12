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


    public $showingCaseModal = false;
    public $case_title;
 //   public $user_id_cliente;
    public $user_id_abogado;
    public $case_types_id;
    public $client_position;
  //  public $client_dni;
  //  public $client_birth_date;
 //   public $client_declarated_address;
 //   public $client_home_address;
 //   public $client_mobile_phone;
    public $case_document;
    public $description;

    public function render()
    {
        $lawyers = User::whereNotIn('name', ['admin','client'])->get();
        $case_types = CaseType::all();

        return view('livewire.mult-auth.normal-case-index',compact('lawyers','case_types'));
    }


    public function showCaseModal()
    {
        $this->showingCaseModal = true;
    }

    public function storeCase()
    {
    $user_id_cliente = Auth::user()->id;
    $doc = $this->case_document->store('public/docs');
        $this->validate([
            'case_title'=>'required',
        //    'user_id_cliente'=>'required',
            'user_id_abogado'=>'required',
            'case_types_id'=>'required',
            'client_position'=>'required',
            'description'=>'required',
            'case_document'=>'image|max:1024',


        ]);


    NormalCases::create([
            'case_title'=>$this->case_title,
            'user_id_cliente'=>$user_id_cliente,
            'user_id_abogado'=>$this->user_id_abogado,
            'case_types_id'=>$this->case_types_id,
            'client_position'=>$this->client_position,
            'description'=>$this->description,
            'case_document'=>$this->case_document,

        ]);

        $this->reset();
    }





}
