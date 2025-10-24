<?php

namespace App\Livewire\App;

use App\Livewire\Forms\App\ConfigurationForm;
use App\Models\Configuration;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class ConfigurationEditor extends Component
{
    public $configurations = [];

    public ConfigurationForm $form;
    public $deleteConfirm = false;
    public $edit = false;
    public function mount()
    {
        $this->configurations = Configuration::all();
        $this->edit = false;
    }

    public function render()
    {
        return view('livewire.app.configuration-editor');
    }

    public function createNew()
    {
        $this->form->clear();
        $this->edit = false;
    }

    public function load($cId)
    {
        $config = Configuration::findOrFail($cId);
        $this->form->load($config);
        $this->edit = true;
    }

    public function submitForm()
    {
        if(is_null($this->form->configuration)){
            if($this->form->save())
            {
                Toaster::success("saved");
                $this->mount();
            }else{
                Toaster::error("could not save");
            }
        }else{
            if($this->form->update()){
                Toaster::success("updated");
                $this->mount();
            }else{
                Toaster::error("could not update");
            }
        }
    }

    public function delete()
    {
        $this->deleteConfirm = true;
    }
    public function confirmDelete()
    {
        if($this->form->configuration->delete()){
            Toaster::success("deleted");
            $this->mount();
            $this->form->clear();
        }
    }
}
