<?php

namespace App\Livewire\App;

use App\Livewire\Forms\App\LegalFieldForm;
use App\Models\LegalField;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class LegalFieldOverview extends Component
{

    public $legalFields = [];

    public bool $editing = false;

    public LegalFieldForm $form;
    public $activeUuid = "";
    public function mount()
    {
        $this->legalFields = LegalField::all()->sortBy("number");
    }
    public function render()
    {
        return view('livewire.app.legal-field-overview');
    }

    public function abortForm()
    {
        $this->editing = false;
        $this->form->clear();
    }

    public function submitForm()
    {
        if(!$this->editing) {
            if($this->form->save()){
                Toaster::success(__("Saved"));
                $this->abortForm();
                $this->legalFields = LegalField::all()->sortBy("number");
            }
        }
    }

    public function select($uuid)
    {
        $lf = LegalField::findOrFail($uuid);
        $this->form->load($lf);
        $this->activeUuid = $uuid;
    }
}
