<?php

namespace App\Http\Livewire\Lawyer;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;


class ClientsTable extends Component
{
     use WithPagination;

     protected $queryString = [
         'search'=>['except'=>''],
         'perPage'

        ];
     public $search ='';
     public $perPage ='10';


    public function render()
    {

       return view('livewire.lawyer.clients-table',
        [
            'clients' => User::role('Cliente')
            ->where('name', 'LIKE',"%{$this->search}%")->paginate($this->perPage)
        ]);
    }



    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = 10;

    }
}
