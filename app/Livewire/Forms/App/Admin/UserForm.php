<?php

namespace App\Livewire\Forms\App\Admin;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate(['required'])]
    public $name = '';

    #[Validate(['required', 'email', 'max:254'])]
    public $email = '';

    #[Validate(['nullable', 'date'])]
    public $email_verified_at = '';

    #[Validate(['required'])]
    public $password = '';

    #[Validate(['nullable'])]
    public $two_factor_secret = '';

    #[Validate(['nullable'])]
    public $two_factor_recovery_codes = '';

    #[Validate(['nullable', 'date'])]
    public $two_factor_confirmed_at = '';

    public ?User $user = null;

    public $available_roles_names = [];
    public $assigned_roles_names = [];
    public function load(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function clear()
    {
        $this->user = null;
        $this->name = '';
        $this->email = '';
    }

    public function addRoles()
    {
        return $this->user->assignRole($this->available_roles_names);
    }

    public function removeRoles()
    {

        return $this->user->removeRole($this->assigned_roles_names);
    }
}
