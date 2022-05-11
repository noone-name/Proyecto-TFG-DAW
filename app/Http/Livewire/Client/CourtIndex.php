<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\TableExample;

class CourtIndex extends Component
{
    use WithFileUploads;

    public $showingCourtModal = false;
    public $first_name;
    public $phone;
    public $upload;
    public $message;

    public function showCourtModal()
    {
        $this->showingCourtModal = true;
    }

    public function storeCourtCase()
    {
            $documents = $this->upload->store('public/docs');

            TableExample::create([
                'first_name'=> $this->first_name,
                'phone'=> $this->phone,
                'upload'=> $documents,
                'message'=> $this->message,

            ]);
            $this->reset();
    }

    public function render()
    {
        return view('livewire.client.court-index');
    }
}
