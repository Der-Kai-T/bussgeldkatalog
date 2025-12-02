<?php

namespace App\Livewire\App;

use App\Livewire\Forms\App\LawForm;
use App\Models\Configuration;
use App\Models\Law;
use App\Models\LegalField;
use Cloudstudio\Modal\LivewireModal;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class LawEditor extends Component
{

    public Law $law;

    public string $globalPrefix = "";
    public $editing = true;

    public LawForm $form;

    public $legal_maximum_careless = 0;
    public $legal_maximum_intention = 0;

    public $law_print = false;
    public $law_export = false;
    public $allegations = [];

    public $legalFields = [];

    public function mount(Law $law)
    {
        $this->law = $law;
        $this->globalPrefix = Configuration::where("key", "globalPrefix")->first()
            ->value;

        $this->allegations = $this->law->allegations;
        $this->form->mount($law);
        $this->legalFields = LegalField::all()->sortBy("name");
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

    public function setAllLegalMaximum()
    {
        $this->law->allegations()->update(["legal_maximum_careless" => $this->legal_maximum_careless, "legal_maximum_intention" => $this->legal_maximum_intention]);
        $this->mount($this->law);
        Toaster::success("saved");
    }

    public function setAllBoolean()
    {
        $this->law->allegations()->update(["print" => $this->law_print, "export" => $this->law_export]);
        $this->mount($this->law);
        $this->allegations = $this->law->allegations;
        Toaster::success("saved");
    }

    public function render()
    {
        return view('livewire.app.law-editor');
    }


}
