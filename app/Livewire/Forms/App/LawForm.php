<?php

namespace App\Livewire\Forms\App;

use App\Models\Law;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LawForm extends Form
{
    #[Validate(['required'])]
    public $name = '';

    #[Validate(['required'])]
    public $short = '';

    #[Validate(['nullable'])]
    public $prefix = '';

    #[Validate(['nullable'])]
    public $department = '';

    #[Validate(['nullable'])]
    public $lead_office = '';

    #[Validate(['nullable'])]
    public $internal_note = null;

    #[Validate(['required', 'date'])]
    public $valid_from = null;

    #[Validate(['nullable', 'date'])]
    public $valid_until = null;

    #[Validate(['nullable', 'exists:legal_fields,id'])]
    public $legal_field_id = null;

    public ?Law $law = null;
    public function mount(Law $law)
    {
        $this->law = $law;
        $this->prefix = $law->prefix;
        $this->name = $law->name;
        $this->short = $law->short;
        $this->department = $law->department;
        $this->lead_office = $law->lead_office;
        $this->internal_note = $law->internal_note;
        $this->legal_field_id = $law->legal_field_id;
        $this->valid_from = $law->valid_from?->format('Y-m-d');
        $this->valid_until = $law->valid_until?->format('Y-m-d');
    }

    public function clear()
    {
        $this->law = null;
        $this->prefix = '';
        $this->name = '';
        $this->short = '';
        $this->department = '';
        $this->lead_office = '';
        $this->internal_note = null;
        $this->legal_field_id = null;
        $this->valid_from = null;
        $this->valid_until = null;
    }
    public function update()
    {
        if($this->legal_field_id == "null")
        {
            $this->legal_field_id = null;
        }
        $this->validate();
        return $this->law->update($this->except(["law"]));
    }

    public function create()
    {
        $this->validate();
        return Law::create($this->except(["law"]));
    }
}
