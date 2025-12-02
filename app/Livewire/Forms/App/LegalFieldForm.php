<?php

namespace App\Livewire\Forms\App;

use App\Livewire\App\LegalFieldOverview;
use App\Models\LegalField;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LegalFieldForm extends Form
{
    #[Validate(['required'])]
    public $name = '';

    #[Validate(['required', 'integer'])]
    public $number = 0;

    public ?LegalField $legalField = null;

    public function clear()
    {
        $this->name = '';
        $this->number = 0;
        $this->legalField = null;
    }

    public function load(LegalField $legalField)
    {
        $this->legalField = $legalField;
        $this->name = $legalField->name;
        $this->number = $legalField->number;
    }

    public function save()
    {
        $this->validate();
        return LegalField::create($this->except("legalField"));
    }

    public function update()
    {
        $this->validate();
        return $this->legalField->update($this->except("legalField"));
    }
}
