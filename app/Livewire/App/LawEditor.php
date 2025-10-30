<?php

namespace App\Livewire\App;

use App\Livewire\Forms\App\LawForm;
use App\Models\Configuration;
use App\Models\Law;
use Cloudstudio\Modal\LivewireModal;
use Livewire\Component;

class LawEditor extends Component
{

    public Law $law;

    public string $globalPrefix = "";
    public $editing = true;

    public LawForm $form;
    public function mount(Law $law)
    {
        $this->law = $law;
        $this->globalPrefix = Configuration::where("key", "globalPrefix")->first()
            ->value;

        $this->form->mount($law);
    }

    public function toggleEditing()
    {
        $this->editing = !$this->editing;
    }

    public function submitForm()
    {
        $this->form->update();
        $this->law->refresh();
    }
    public function render()
    {
        return view('livewire.app.law-editor');
    }


}
