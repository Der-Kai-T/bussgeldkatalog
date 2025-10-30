<?php

namespace App\Livewire\App;

use App\Livewire\Forms\App\AllegationForm;
use App\Models\Infringement;
use App\Models\Law;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class AllegationCreate extends Component
{

    public Law $law;
    public $infringements;
    public AllegationForm $form;


    public function mount($lawid){
        $this->law = Law::findOrFail($lawid);
        $this->infringements = Infringement::all();
        $this->form->law_id = $lawid;
        $this->form->valid_from = $this->law->valid_from?->format('Y-m-d');
        $this->form->valid_until = $this->law->valid_until?->format('Y-m-d');

    }
    public function render()
    {
        return view('livewire.app.allegation-create');
    }

    public function submitForm(){
        if($this->form->create()){
            Toaster::success("gespeichert");
        }
    }
}
