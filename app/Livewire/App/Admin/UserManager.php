<?php

namespace App\Livewire\App\Admin;

use App\Livewire\Forms\App\Admin\UserForm;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class UserManager extends Component
{

    public $users = [];
    public bool $editing = false;
    public $userId = null;

    public UserForm $form;

    public $assignedRoles = [];
    public $availableRoles = [];
    public $rolesHeight = 0;
    public function mount()
    {
        if(!auth()->user()->can("admin.user")){
            abort(403);
        }
        $this->users = User::all()->sortBy("name");

        $this->select(User::first()->id);

    }


    public function render()
    {
        return view('livewire.app.admin.user-manager');
    }

    public function select($uuid)
    {
        $selectedUser = User::findOrFail($uuid);
        $this->editing = true;
        $this->userId = $uuid;
        $this->form->load($selectedUser);

        $allRoles = Role::all()->sortBy('name');
        $this->assignedRoles = $selectedUser->roles;
        $assignedRoleName = $this->assignedRoles->pluck('name');
        $this->availableRoles = $allRoles->reject(function ($role) use ($assignedRoleName) {
            return $assignedRoleName->contains($role->name);
        })->values();
        $this->rolesHeight = $this->assignedRoles->count() + $this->availableRoles->count();
    }

    public function abortForm()
    {
        $this->form->clear();
        $this->editing = false;
        $this->userId = null;
    }

    public function addRoles()
    {
        if($this->form->addRoles())
        {
            Toaster::success(__("Saved"));
            $this->users = User::all()->sortBy("name");
            $this->select($this->userId);
        }
    }

    public function removeRoles()
    {
        if($this->form->removeRoles())
        {
            Toaster::success(__("Saved"));
            $this->users = User::all()->sortBy("name");
            $this->select($this->userId);
        }
    }
}
