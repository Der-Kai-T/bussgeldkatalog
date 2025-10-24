<?php

namespace App\Livewire\App;

use App\Models\Configuration;
use App\Models\Law;
use Livewire\Component;

class Allegations extends Component
{
    public $laws = [];
    public string $globalPrefix = "";
    public function mount()
    {
        $this->laws = Law::all();
        $this->globalPrefix = Configuration::where("key", "globalPrefix")->first()
            ->value;
    }
    public function render()
    {
        return view('livewire.app.allegations');
    }
}
