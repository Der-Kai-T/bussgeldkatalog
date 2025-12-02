<?php

namespace App\Livewire\Forms\App;

use App\Models\Allegation;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AllegationForm extends Form
{
//    #[Validate(['required'])]
    public $law_id = '';

    #[Validate(['required'])]
    public $number = '';

    #[Validate(['required'])]
    public $text = '';

    #[Validate(['required'])]
    public $quote = '';

    #[Validate(['nullable', 'numeric'])]
    public $fine_regular = null;

    #[Validate(['nullable', 'numeric'])]
    public $fine_min = null;

    #[Validate(['nullable'])]
    public $fine_max = null;

    #[Validate(['nullable', 'numeric'])]
    public $legal_maximum_intention = '';

    #[Validate(['nullable', 'numeric'])]
    public $legal_maximum_careless = '';


    #[Validate(['required', 'date'])]
    public $valid_from = '';

    #[Validate(['nullable'])]
    public $valid_until = null;

    public $print = true;
    public $export = true;
    #[Validate(['nullable', 'exists:infringements,id'])]
    public $infringement_id = null;

    public ?Allegation $allegation = null;

    public function mount(Allegation $allegation)
    {
        $this->allegation = $allegation;
        $this->number = $allegation->number;
        $this->text = $allegation->text;
        $this->quote = $allegation->quote;
        $this->fine_regular = $allegation->fine_regular;
        $this->fine_min = $allegation->fine_min;
        $this->fine_max = $allegation->fine_max;
        $this->legal_maximum_intention = $allegation->legal_maximum_intention;
        $this->legal_maximum_careless = $allegation->legal_maximum_careless;
        $this->valid_from = $allegation->valid_from->format("Y-m-d H:m");
        $this->print = $allegation->print;
        $this->export = $allegation->export;
        $this->infringement_id = $allegation->infringement_id;
        $this->law_id = $allegation->law_id;
        if(!is_null($allegation->valid_until)) {
            $this->valid_until = $allegation->valid_until->format("Y-m-d H:m");
        }
    }

    public function update()
    {
        $this->validate();
        return $this->allegation->update($this->except(["allegation"]));
    }

    public function create()
    {
        $this->validate();
        return Allegation::create($this->except(["allegation"]));
    }
}
