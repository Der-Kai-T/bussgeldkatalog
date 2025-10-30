<?php

namespace App\Livewire\App;

use App\Livewire\Forms\App\LawForm;
use Livewire\Component;

class LawCreate extends Component
{

    public LawForm $form;
    public function render()
    {
        return view('livewire.app.law-create');
    }

    public function submitForm(){
        $law = $this->form->create();
        if(!is_null($law)){
            $this->redirect("/law/$law->id");
        }
    }
}
