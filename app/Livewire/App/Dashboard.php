<?php

namespace App\Livewire\App;

use App\Models\Allegation;
use App\Models\Configuration;
use Livewire\Component;

class Dashboard extends Component
{
   public  $missingLegalMaximum = [];
    public $missingInfringementType = [];

    public string $globalPrefix = "";
    public function mount()
    {
        $this->missingInfringementType = Allegation::whereNull('infringement_id')->get();
        $this->missingLegalMaximum = Allegation::where(function ($q) {
            $q->where('legal_maximum_careless', 0)
                ->orWhereNull('legal_maximum_careless');
        })
            ->where(function ($q) {
                $q->where('legal_maximum_intention', 0)
                    ->orWhereNull('legal_maximum_intention');
            })
            ->get();

        $this->globalPrefix = Configuration::where("key", "globalPrefix")->first()
            ->value;
    }
    public function render()
    {
        return view('livewire.app.dashboard');
    }
}
