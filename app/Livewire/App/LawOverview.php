<?php

namespace App\Livewire\App;

use App\Models\Law;
use Livewire\Component;

class LawOverview extends Component
{

    public $laws = [];

    public function mount()
    {
        $this->laws = Law::all()->sortBy('prefix');
    }
    public function render()
    {
        return view('livewire.app.law-overview');
    }
}
