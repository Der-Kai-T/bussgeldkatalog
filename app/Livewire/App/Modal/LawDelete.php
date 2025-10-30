<?php

namespace App\Livewire\App\Modal;

use App\Models\Law;
use Cloudstudio\Modal\LivewireModal;
use Livewire\Component;

class LawDelete extends LivewireModal
{
    public Law $law;

    public function mount($lawid)
    {
        $this->law = Law::findorfail($lawid);
    }
    public function render()
    {
        return view('livewire.app.modal.law-delete');
    }

   public function confirmModal()
   {
       $this->law->allegations()->delete();
       $this->law->delete();
       $this->redirect(route('laws'), navigate: true);
   }
}
