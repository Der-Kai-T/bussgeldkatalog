<?php

namespace App\Livewire\Forms\App;

use App\Models\Configuration;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ConfigurationForm extends Form
{
    #[Validate(['required'])]
    public $key = '';

    #[Validate(['required'])]
    public $value = '';

    public ?Configuration $configuration = null;

    public function load(Configuration $configuration)
    {
        $this->configuration = $configuration;
        $this->key = $configuration->key;
        $this->value = $configuration->value;
    }

    public function clear()
    {
        $this->key = '';
        $this->value = '';
        $this->configuration = null;
    }

    public function save()
    {
        $this->validate();
        return Configuration::create($this->except(["configuration"]));
    }

    public function update()
    {
        $this->validate();
        return $this->configuration->update($this->except(["configuration"]));
    }
}
