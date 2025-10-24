<?php

namespace App\Livewire\App;

use App\Livewire\Forms\App\AllegationForm;
use App\Models\Allegation;
use App\Models\Law;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class AllegationEditor extends Component
{
    public Allegation $allegation;
    public Law $law;

    public AllegationForm $form;
    public function mount(Allegation $allegation)
    {
        $this->allegation = $allegation;
        $this->law = $this->allegation->law;
        $this->form->mount($this->allegation);
    }
    public function render()
    {
        return view('livewire.app.allegation-editor');
    }

    public function submitForm()
    {

        if($this->form->update())
        {
            Toaster::success('saved');
        }
    }


}
